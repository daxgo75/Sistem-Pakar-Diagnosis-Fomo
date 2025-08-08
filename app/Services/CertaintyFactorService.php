<?php

namespace App\Services;

class CertaintyFactorService
{
    /**
     * Calculate CF for each symptom
     * CFgejala = CF(pakar) * CF(user)
     */
    public function calculateCFGejala($cfUser, $cfPakar)
    {
        return $cfPakar * $cfUser; // Changed order to cfPakar * cfUser
    }

    /**
     * Combine CF values
     * CFcombine = CFold + CFgejala * (1-CFold)
     */
    public function calculateCFCombine($cfOld, $cfGejala)
    {
        return $cfOld + ($cfGejala * (1 - $cfOld));
    }

    /**
     * Calculate final percentage
     * Presentase = CFpenyakit * 100
     */
    public function calculatePercentage($cfPenyakit)
    {
        return round($cfPenyakit * 100, 1); // Added rounding to 1 decimal place
    }

    /**
     * Process diagnosis with multiple symptoms
     */
    public function processDiagnosis($selectedGejala)
    {
        $gejalaByPenyakit = collect($selectedGejala)
            ->groupBy('penyakit_id')
            ->map(function ($gejalaGroup) {
                $cfOld = 0;
                $processedGejala = [];

                foreach ($gejalaGroup as $index => $gejala) {
                    // Calculate CF for current symptom (cfPakar * cfUser)
                    $cfGejala = $this->calculateCFGejala(
                        $gejala['cf_user'],
                        $gejala['cf_pakar']
                    );

                    // Store calculation details
                    $processedGejala[] = array_merge($gejala, [
                        'cf_gejala' => $cfGejala
                    ]);

                    // For first iteration, CF old is same as CF gejala
                    if ($index === 0) {
                        $cfOld = $cfGejala;
                        continue;
                    }

                    // Combine with previous CF
                    $cfOld = $this->calculateCFCombine($cfOld, $cfGejala);
                }

                return [
                    'cf_value' => $cfOld,
                    'percentage' => $this->calculatePercentage($cfOld),
                    'gejala_terpilih' => $processedGejala
                ];
            });

        return $gejalaByPenyakit
            ->sortByDesc('cf_value')
            ->values()
            ->first();
    }
}
