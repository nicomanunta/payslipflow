<!-- Modal -->
<div class="modal fade mt-5" id="modalDeleteEmployee{{ $employee->id }}" tabindex="-1" aria-labelledby="modalDeleteEmployeeLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-delete-employees ">
      <div class="modal-content border-0 bg-modal">
        <div class="modal-header position-relative border-0 ">
          <h2 class="pt-3 px-2 modal-title  montserrat-bold dark-grey text-shadow-grey" id="modalDeleteEmployeeLabel">Sei sicuro di voler eliminare "{{$employee->employee_name}} {{$employee->employee_surname}}" dal database dei dipendenti?</h2>
        </div>
        <div class="modal-body border-0">
            <p id="costum-message" class="poppins-medium steel-blue fs-6 px-2">Una volta eliminato il dipendente selezionato, i suoi dati e il profilo non saranno più visibili, ma rimarranno comunque archiviati nel database per motivi di sicurezza e tracciabilità.</p>   
        </div>
        
        <div class="modal-footer border-0">
            <x-secondary-button  type="button" class="montserrat-bold dark-grey text-uppercase" data-bs-dismiss="modal">Chiudi</x-secondary-button>
                <form action="{{route('admin.employees.destroy', ['employee'=> $employee->id])}}" method="post">
                @csrf
                @method('DELETE')
                <x-danger-button type="submit" class="montserrat-bold dark-grey text-uppercase ">Elimina</x-danger-button>
            </form>
        </div>
      </div>
    </div>
  </div>