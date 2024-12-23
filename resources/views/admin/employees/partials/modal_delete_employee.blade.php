<!-- Modal -->
<div class="modal fade mt-5" id="modalDeleteEmployee{{ $employee->id }}" tabindex="-1" aria-labelledby="modalDeleteEmployeeLabel" aria-hidden="true">
    <div class="modal-dialog ">
      <div class="modal-content border-0 bg-modal">
        <div class="modal-header border-0">
          <h3 class="modal-title" id="modalDeleteEmployeeLabel">Eliminazione to-do list </h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body border-0">
            <h3 id="costum-message" class="">Sei sicuro di voler eliminare {{$employee->employee_name}} {{$employee->employee_surname}} dal database dei dipendenti?</h3>   
        </div>
        
        <div class="modal-footer border-0">
            <button type="button" class="btn" data-bs-dismiss="modal">Chiudi</button>
                <form action="{{route('admin.employees.destroy', ['employee'=> $employee->id])}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn ">Elimina</button>
            </form>
        </div>
      </div>
    </div>
  </div>