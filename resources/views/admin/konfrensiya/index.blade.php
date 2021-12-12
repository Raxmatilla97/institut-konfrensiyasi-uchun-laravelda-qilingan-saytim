@extends('layouts.admin')
@section('content')


@can('users_manage')
    <!-- <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.users.create") }}">
            
            </a>
        </div>
    </div> -->
@endcan


<div class="card">
    <div class="card-header">
        {{ trans('cruds.user.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-User">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            Id raqami
                        </th>
                        <th>
                            FISH
                        </th>
                        <th>
                            Qayerdanligi
                        </th>
                        <th>
                            Telefon
                        </th>
                        <th>
                            Email
                        </th>
                        <th>
                            To'lov qilganligi
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
                                {{ $ko->country ?? '' }}
                            </td>
                            <td>
                                {{ $ko->work_phone ?? '' }}
                            </td>
                            <th>
                                {{ $ko->email ?? '' }}
                            </th>
                            <td>
                            @if($ko->tolov == 0)
                            <button style="margin: auto; width: 100px;" type="button" class="btn btn-block btn-danger btn-xs">To'lanmagan</button>
                            @else
                            <button style="margin: auto; width: 100px;" type="button" class="btn btn-block btn-success btn-xs">To'langan</button>
                            @endif
                            </td>
                            <td>
                                <a class="btn btn-xs btn-primary" href="{{ route('admin.konf.show', $ko->id) }}">
                                    Ko'rish
                                </a>

                                <a class="btn btn-xs btn-info" href="{{ route('admin.konf.edit', $ko->id) }}">
                                   Tahrirlash
                                </a>

                                <form action="{{ route('admin.konf.destroy', $ko->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="submit" class="btn btn-xs btn-danger" value="O'chirish">
                                </form>

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
@can('users_manage')
  let deleteButtonTrans = "O'chirish"
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.users.mass_destroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

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