@extends('layouts.admin')
@section('content')


@if( count($konf) == 0)
<div style="margin-bottom: 10px; " class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" style="width: 100%; height: 100px; font-size: 40px;" href="{{ route('admin.home.create') }}">
            Yaratish | Создать | Create new
            </a>
        </div>
    </div> 
@endif


<div class="card">
    <div class="card-header">
        List
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-User">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            ID
                        </th>
                        <th>
                        To'liq ism | ФИО | Full name
                        </th>
                        <th>
                        Email
                        </th>
                        <th>
                        Mobile phone
                        </th>
                        <th>
                        Anketa holati | Статус анкеты | Questionnaire status
                        </th>
                        <th>
                        To'lov holati | Статус платежа | Payment status
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($konf as $key => $ko)
                        <tr data-entry-id="{{ $ko->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $ko->id ?? '' }}
                            </td>
                            <td>
                                {{ $ko->first_name ?? '' }} {{ $ko->last_name ?? '' }} {{ $ko->middle_name ?? '' }}
                            </td>
                            <td>
                                {{ $ko->email ?? '' }}
                            </td>
                            <td>
                                {{ $ko->work_phone ?? '' }}
                            </td>
                            <th>
                            @if($ko->hato_bormi == 0)
                            <button style="margin: auto; width: 80%;" type="button" class="btn btn-block btn-warning btn-xs">Ko'rib chiqilmoqda <br> Под следствием <br> Under sledstviem</button>
                            @elseif($ko->hato_bormi == 1)
                            <button style="margin: auto; width: 80%;" type="button" class="btn btn-block btn-success btn-xs">Anketada xato yo'q <br> В анкете нет ошибки <br> There is no error</button>
                            @else
                            <button style="margin: auto; width: 80%;" type="button" class="btn btn-block btn-danger btn-xs">Anketada xato bor <br> Ошибка в анкете <br> There is an error</button>
                            @endif
                            </th>
                            <td>
                            @if($ko->tolov == 0)
                            <button style="margin: auto; width: 80%;" type="button" class="btn btn-block btn-danger btn-xs">To'lanmagan <br> Не оплачено <br> Not paid</button>
                            @else
                            <button style="margin: auto; width: 80%;" type="button" class="btn btn-block btn-success btn-xs">To'lagan <br> Оплаченный <br> Paid</button>
                            @endif
                            </td>
                            <td>
                                <a class="btn btn-xs btn-primary" href="{{ route('admin.home.show', $ko->id) }}">
                                Ko'rish <br> Видеть <br> View
                                </a>

                                <a class="btn btn-xs btn-info" href="{{ route('admin.home.edit', $ko->id) }}">
                                Tahrirlash <br> Редактировать <br> Edit
                                </a>

                                <!-- <form action="{{ route('admin.home.destroy', $ko->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="submit" class="btn btn-xs btn-danger" value="Delete">
                                </form> -->

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)


  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-User:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection