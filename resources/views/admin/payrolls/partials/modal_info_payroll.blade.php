<!-- Modal -->
<div class="modal fade mt-5" id="modalInfoPayroll{{ $item->id }}" tabindex="-1" aria-labelledby="modalInfoPayrollLabel" aria-hidden="true">
    <div class="modal-dialog ">
      <div class="modal-content border-0 bg-modal">
        <div class="modal-header border-0 ">
          <h3 class="modal-title " id="modalInfoPayrollLabel">Dettagli busta paga del {{$item->payroll_month}}</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body border-0">
          <ul class="p-0">
            <li class="mb-2"><b>Salario lordo:</b> {{$contract->contract_gross_monthly_salary}}€</li>  
            <li class="mb-2"><b>Imponibile IRPEF:</b> {{$item->payroll_taxable_irpef}}€</li>  
            @if ($item->extra->extra_thirteenth_salary == 0)
              <li class="mb-2"><b>Tredicesima:</b> No</li>  
            @elseif ($item->extra->extra_thirteenth_salary == 1)
              <li class="mb-2"><b>Tredicesima:</b> Si</li>    
            @endif
            @if ($item->extra->extra_fourteenth_salary == 0)
              <li class="mb-2"><b>Quattordicesima:</b> No</li>  
            @elseif ($item->extra->extra_fourteenth_salary == 1)
              <li class="mb-2"><b>Quattordicesima:</b> Si</li>    
            @endif
            
            <li class="mb-2"><b>Quattordicesima:</b> {{$item->payroll_taxable_irpef}}€</li>  
          </ul>
        </div>
        
        {{-- <div class="modal-footer border-0">
            <button type="button" class="btn" data-bs-dismiss="modal">Chiudi</button>
                <form action="{{route('admin.employees.destroy', ['employee'=> $employee->id])}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn ">Elimina</button>
            </form>
        </div> --}}
      </div>
    </div>
  </div>