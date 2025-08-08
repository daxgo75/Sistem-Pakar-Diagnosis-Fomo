@extends('admin.layouts.AdminApp')

@section('content')
    <div class="mx-auto p-4 sm:p-6 lg:p-8"> {{-- Hapus max-w-7xl --}}
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Daftar Gejala</h1>
            <a href="{{ route('admin.gejala.create') }}"
                class="inline-flex items-center text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 transition duration-150 ease-in-out">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                    </path>
                </svg>
                Tambah Gejala
            </a>
        </div>

        @if (session('success'))
            <div id="success-notification"
                class="p-4 mb-6 text-sm text-green-700 bg-green-100 rounded-lg flex items-center 
                transition-all duration-500 ease-in-out transform opacity-0 animate-notification-in">
                <svg class="w-5 h-5 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="font-medium flex-grow">{{ session('success') }}</span>
                <button onclick="hideNotification()" class="ml-4 text-green-700 hover:text-green-800">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>

            <style>
                @keyframes notificationIn {
                    0% {
                        opacity: 0;
                        transform: translateY(-10px);
                    }

                    100% {
                        opacity: 1;
                        transform: translateY(0);
                    }
                }

                .animate-notification-in {
                    animation: notificationIn 0.4s cubic-bezier(0.21, 1.02, 0.73, 1) forwards;
                }
            </style>

            <script>
                // Auto-hide after 5 seconds
                let notificationTimer = setTimeout(hideNotification, 5000);

                function hideNotification() {
                    clearTimeout(notificationTimer);
                    let notification = document.getElementById('success-notification');
                    if (notification) {
                        notification.style.transform = 'translateY(-10px)';
                        notification.style.opacity = '0';
                        notification.style.pointerEvents = 'none';
                        notification.style.marginBottom = '0';
                        notification.style.paddingTop = '0';
                        notification.style.paddingBottom = '0';
                        notification.style.height = '0';

                        // Remove element after animation completes
                        setTimeout(() => {
                            notification.remove();
                        }, 500);
                    }
                }

                // Pause hide on hover
                document.getElementById('success-notification')?.addEventListener('mouseenter', () => {
                    clearTimeout(notificationTimer);
                });

                // Resume hide when mouse leaves
                document.getElementById('success-notification')?.addEventListener('mouseleave', () => {
                    notificationTimer = setTimeout(hideNotification, 2000);
                });
            </script>
        @endif

        <div class="bg-white rounded-xl shadow overflow-hidden">
            <div class="overflow-x-auto w-full">
                <table id="penyakitTable" class="w-full min-w-[900px] divide-y divide-gray-400">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kode
                                Gejala</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Gejala</th>
                            <th scope="col"
                                class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-400">
                        @foreach ($gejalas as $index => $g)
                            <tr class="hover:bg-gray-50 transition duration-150 ease-in-out">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    {{ $index + 1 }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-red-600">
                                    {{ $g->kode_g }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-base font-medium text-gray-900">
                                    {{ $g->nama_gejala }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-xl font-medium text-gray-900">
                                    <div class="flex justify-end space-x-2">
                                        <a href="{{ route('admin.gejala.edit', $g->id) }}"
                                            class="inline-flex items-center justify-center p-1.5 border border-transparent rounded-lg shadow-sm text-white bg-amber-500 hover:bg-amber-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500"
                                            title="Edit">
                                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                </path>
                                            </svg>
                                        </a>
                                        <form action="{{ route('admin.gejala.destroy', $g->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus penyakit ini?')"
                                                class="inline-flex items-center justify-center p-1.5 border border-transparent rounded-lg shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
                                                title="Hapus">
                                                <svg class="h-5 w-5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                    </path>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
