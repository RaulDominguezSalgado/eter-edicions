<!-- delete-confirmation-modal.blade.php -->
<div id="confirmDelete-{{ $id }}" class="fixed z-10 inset-0 overflow-y-auto hidden bg-gray-500 bg-opacity-75">
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white rounded-lg overflow-hidden shadow-xl sm:max-w-lg sm:w-full">
            <div class="bg-gray-100 px-4 pt-5 pb-4 sm:p-6">
                <div class="sm:flex sm:items-start">
                    <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-gray-200 sm:mx-0 sm:h-10 sm:w-10">
                        <svg class="h-6 w-6 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7H7v6m6 0h6m-6-6V3m0 12v6m0-6H7m6 0h6" />
                        </svg>
                    </div>
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Eliminar</h3>
                        <div class="mt-2">
                            <p class="text-sm text-gray-700">{{ $message }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-gray-100 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <form action="{{ $action }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-gray-600 text-base font-medium text-gray-100 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Sí, eliminar
                    </button>
                </form>
                <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm" onclick="document.getElementById('confirmDelete-{{ $id }}').classList.add('hidden');">
                    Cancelar
                </button>
            </div>
        </div>
    </div>
</div>
