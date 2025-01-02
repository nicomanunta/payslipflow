<!-- Modal -->
<div class="modal fade mt-1" id="modalInfoPayroll{{ $item->id }}" tabindex="-1" aria-labelledby="modalInfoPayrollLabel" aria-hidden="true">
    <div class="modal-dialog ">
      <div class="modal-content border-0 bg-modal">
        <div class="modal-header position-relative  border-0 text-center">
          <div class="logo-container mt-2">
            <img class="me-2" src="{{ asset('storage/' . $user->user_img) }}" alt="">
            <img class="ms-2" src="{{ $employee->employee_img ? asset('storage/' . $employee->employee_img) : URL::asset('/img/profilo-vuoto.jpeg') }}" alt="">         
          </div>
        </div>
        <button type="button" class="btn-close text-end position-absolute" data-bs-dismiss="modal" aria-label="Close"></button>
        <h3 class="modal-title text-center mt-4 mb-2 montserrat-bold" id="modalInfoPayrollLabel"> busta paga di "{{$employee->employee_name}} {{$employee->employee_surname}}" del "{{$item->payroll_month}}"</h3>
        
        <div class="modal-body border-0">

          <table class="table">
            <h5 class="text-center text-uppercase border border-bottom-0 m-0 py-2 montserrat-bold">Dettagli</h5>
            <tbody class="rorboto-regular">
              <tr class="table-50">
                <td class="border border-bottom-0">
                  <b>Ore straordinari nei giorni feriali:</b> {{$item->extra->extra_weekday_overtime_hours}}. 
                </td>
                <td class="border-1">
                  @if ($item->extra->extra_thirteenth_salary == 0)
                    <b>Tredicesima:</b> No.  
                  @elseif ($item->extra->extra_thirteenth_salary == 1)
                    <b>Tredicesima:</b> Si.    
                  @endif  
                </td>
              </tr>
              <tr>
                <td class="border-start  border-bottom-0">  
                  <b>Ore straordinari nel fine settimana:</b> {{$item->extra->extra_weekend_overtime_hours}}.
                </td>
                <td class="border-1">
                  @if ($item->extra->extra_fourteenth_salary == 0)
                    <b>Quattordicesima:</b> No.  
                  @elseif ($item->extra->extra_fourteenth_salary == 1)
                    <b>Quattordicesima:</b> Si.    
                  @endif
                </td>
              </tr>
              <tr>
                <td class="border-start border-end">
                  <b>Ore straordinari nei giorni festivi:</b> {{$item->extra->extra_holiday_overtime_hours}}.
                </td>
                <td class="border-0">
                  
                </td>
              </tr>
              <tr>
                <td class="border border-bottom-0"> 
                  <b>Bonus/Premio lordo:</b> {{$item->extra->extra_bonus_rewards}}&euro;.
                </td>
                <td class="border ">
                  <b>Salario lordo:</b> {{$contract->contract_gross_monthly_salary}}&euro;.</li>  
                </td>
              </tr>
              <tr>
                <td class="border-start">
                  <b>Rimborso spese:</b> {{$item->extra->extra_reimbursement_expenses}}&euro;.
                </td>
                <td class="border-start border-end">
                  <b>Salario netto:</b> {{$item->payroll_net_salary}}&euro;.</li>
                </td>
              </tr>
            </tbody>
          </table>








          <div class="row">
            <div class="col-6">
              
            </div>
            <div class="col-6">
              <ul class="p-0">
                
          
              </ul>
            </div>
          </div>
          
          <ul class="p-0">
             
            <li class="mb-2"><b>Imponibile IRPEF:</b> {{$item->payroll_taxable_irpef}}&euro;.</li>  
            
            <li class="mb-2"><b>Mese:</b> {{$item->payroll_month}}.</li>  
            <li class="mb-2"><b>Data versamento:</b> {{ \Carbon\Carbon::parse($item->payroll_day_paid)->format('d-m-Y') }}.</li>
            <li class="mb-2"><b>IRPEF pagato:</b> {{$item->payroll_irpef_to_pay}}.</li>  
            <li class="mb-2"><b>INPS pagato:</b> {{$item->payroll_total_inps}}.</li>  
            <li class="mb-2"><b>Detrazione lavoratore dipendente:</b> {{$item->payroll_monthly_basic_deduction}}.</li>  
            <li class="mb-2"><b>Detrazione familiari a carico:</b> {{$item->payroll_monthly_family_deduction}}.</li>  
            <li class="mb-2"><b>Detrazione figli a carico:</b> {{$item->payroll_monthly_children_deduction}}.</li>  
            <li class="mb-2"><b>Detrazioni totali:</b> {{$item->payroll_monthly_employee_deduction}}.</li>  
            <li class="mb-2"><b>Addizionali &#40;regionali + comunali&#41;:</b> {{$item->payroll_total_surcharge}}.</li>  
            <li class="mb-2"><b>Salario netto:</b> {{$item->payroll_net_salary}}.</li>  
            <li class="mb-2"><b>Ore straordinari nei giorni feriali:</b> {{$item->extra->extra_weekday_overtime_hours}}.</li>  
            <li class="mb-2"><b>Ore straordinari nel fine settimana:</b> {{$item->extra->extra_weekend_overtime_hours}}.</li>  
            <li class="mb-2"><b>Ore straordinari nei giorni festivi:</b> {{$item->extra->extra_holiday_overtime_hours}}.</li>  
            <li class="mb-2"><b>Rimborso spese:</b> {{$item->extra->extra_reimbursement_expenses}}.</li>  
            <li class="mb-2"><b>Bonus/Premio lordo:</b> {{$item->extra->extra_bonus_rewards}}&euro;.</li>  

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