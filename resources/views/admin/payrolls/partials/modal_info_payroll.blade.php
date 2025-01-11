<!-- Modal -->
<div class="modal fade mt-1" id="modalInfoPayroll{{ $item->id }}" tabindex="-1" aria-labelledby="modalInfoPayrollLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-show-payrolls">
      <div class="modal-content border-0 bg-modal">
        <div class="modal-header position-relative  border-0 text-center">
          <img class="logo-payslipflow-modal-info position-absolute" src="{{URL::asset('/img/logo-sfondo-bianco.jpeg')}}" alt="">
          <div class="logo-container mt-2">
            <img class="me-2" src="{{ asset('storage/' . $user->user_img) }}" alt="">
            <img class="ms-2" src="{{ $employee->employee_img ? asset('storage/' . $employee->employee_img) : URL::asset('/img/profilo-vuoto.jpeg') }}" alt="">         
          </div>
        </div>
        <button type="button" class="btn-close text-end position-absolute btn-close-show-payrolls" data-bs-dismiss="modal" aria-label="Close"></button>
        <h3 class="modal-title text-center mt-4 mb-2 montserrat-bold text-uppercase" id="modalInfoPayrollLabel"> busta paga di "{{$employee->employee_name}} {{$employee->employee_surname}}" del "{{$item->payroll_month}}"</h3>
        
        {{-- table dettagli --}}
        <div class="modal-body border-0">
          <h6 class="text-center text-uppercase border border-bottom-0 m-0 py-2 montserrat-bold">Dettagli generali</h6>
          <table class="table mb-5 ">
            <tbody class="roboto-regular table-50">
              <tr class="">
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
                <td class="border">
                  <b>Bonus/Premio lordo:</b> {{$item->extra->extra_bonus_rewards}}&euro; 
                </td>
              </tr>
              <tr>
                <td class=" border-0"> 
                </td>
                <td class="border ">
                  <b>Rimborso spese:</b> {{$item->extra->extra_reimbursement_expenses}}&euro;
                </td>
              </tr>
              
            </tbody>
          </table>


          {{-- table imposte --}}
          <h6 class="text-center text-uppercase border border-bottom-0  m-0 py-2 montserrat-bold">dettagli imposte</h6>
          <table class="table mb-5">
            <tbody class="roboto-regular table-50">
              <tr>
                <td class="border ">
                  <b>INPS:</b> {{$item->payroll_total_inps}}&euro;
                </td>
                <td class="border ">
                  <b>IRPEF:</b> {{$item->payroll_irpef_to_pay}}&euro;
                </td> 
              </tr>
              <tr>
                <td class="border-0 "> 
                </td>
                <td class="border  ">
                  <b>Addizionali &#40;regionali + comunali&#41;:</b> {{$item->payroll_total_surcharge}}&euro;
                </td>
              </tr>
            </tbody>
          </table>

          {{-- table detrazioni --}}
          <h6 class="text-center text-uppercase border border-bottom-0  m-0 py-2 montserrat-bold">dettagli irpef</h6>
          <table class="table mb-5">
            <tbody class="roboto-regular table-50">
              <tr>
                <td class="border ">
                  <b>Imponibile IRPEF:</b> {{$item->payroll_taxable_irpef}}&euro;
                </td>
                <td class="border border-bottom-0  ">
                  <b>Detrazione lavoratore dipendente:</b> {{$item->payroll_monthly_basic_deduction}}&euro;
                </td> 
              </tr>
              <tr>
                <td class=" border-0"> 
                </td>
                <td class="border border-top-0 border-bottom-0">
                  <b>Detrazione familiari a carico:</b> {{$item->payroll_monthly_family_deduction}}&euro;
                </td>
              </tr>
              <tr>
                <td class=" border "> 
                  <b>Detrazioni totali:</b> {{$item->payroll_monthly_employee_deduction}}&euro;
                </td>
                <td class="border border-top-0 ">
                  <b>Detrazione figli a carico:</b> {{$item->payroll_monthly_children_deduction}}&euro;
                </td>
              </tr>
            </tbody>
          </table>

          {{-- table netto --}}
          <h6 class="text-center text-uppercase border border-bottom-0  m-0 py-2 montserrat-bold">salario finale</h6>
          <table class="table mb-5">
            <tbody class="table-50">
              <tr>
                <td class="border">
                  <b>Salario lordo:</b> {{$contract->contract_gross_monthly_salary}}&euro;
                </td>
                <td class="border">
                  <b>Salario netto:</b> {{$item->payroll_net_salary}}&euro;
                </td>
              </tr>
            </tbody>
          </table>

          @if ($item->extra->extra_notes)
              <h6 class="py-2 text-uppercase montserrat-bold">note</h6>
              <p>{{$item->extra->extra_notes}}</p>
              <hr>
          @endif

          <div class="row pb-4 px-3">
            <div class="col-3">
              <span><b>Versamento:</b> {{ \Carbon\Carbon::parse($item->payroll_day_paid)->format('d-m-Y') }}</span>
            </div>
            <div class="col-3 text-center">
              <span><b>{{$employee->employee_name}} {{$employee->employee_surname}}</b></span>
            </div>
            <div class="col-3 text-center">
              <span><b>{{$user->name}}</b></span>  
            </div>
            <div class="col-3 text-end ">
              
              <a href="{{route('admin.payrolls.edit', ['payroll' => $item->id])}}">
                <button class="btn-tools-index">
                  <i class="fa-regular fa-pen-to-square"></i>
                </button>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>