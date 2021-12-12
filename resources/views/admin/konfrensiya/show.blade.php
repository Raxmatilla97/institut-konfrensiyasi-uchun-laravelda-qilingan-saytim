@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
       Konfrensiyaga o'z arizasini bergan {{ $konf->first_name }} {{ $konf->last_name }} {{ $konf->middle_name }} ning arizasining to'liq holati.
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                <tr>
                        <th style="width: 50%;">
                        Yaratilgan vaqt | Созданное время | Created time
                        </th>
                        <td>
                         {{ $konf->created_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                        Foydalanuvchi ID raqami | ID номер пользователя | User ID number
                        </th>
                        <td>
                         {{ $konf->user_id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                        Anketa ID raqami | ID номер анкеты | Application form ID number
                        </th>
                        <td>
                            {{ $konf->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                         F.I.O | И.Ф.О | Firs - last - Middle name
                        </th>
                        <td>
                            {{ $konf->first_name }} {{ $konf->last_name }} {{ $konf->middle_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                        Jins | Пол | Gender
                        </th>
                        <td>
                            @if($konf->gender == 'female')
                            Ayol | женский | Female
                            @else
                            Erkak | Мужчина | Male
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.email') }}
                        </th>
                        <td>
                            {{ $konf->email }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                        Sarlavha | Заголовок | Title
                        </th>
                        <td>
                        {{ $konf->title}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                        Mamlakat - shahar | Страна город | Country - City
                        </th>
                        <td>
                          {{ $konf->country}}, {{ $konf->city}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                        Tashkilot | Организация | Organization
                        </th>
                        <td>
                          {{ $konf->organization}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                        Lavozim | Должность | Position
                        </th>
                        <td>
                          {{ $konf->position }}

                        </td>
                    </tr>
                    <tr>
                        <th>
                        Ilmiy darajasi | Ученая степень | Academic degree
                        </th>
                        <td>
                          {{ $konf->academic_degree}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                        Ish telefoni | Рабочий телефон | Work phone
                        </th>
                        <td>
                         {{ $konf->work_phone}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                        Taqdimotning istalgan holati | Желаемый статус презентации | Desired status of presentation
                        </th>
                        <td>
                         {{ $konf->desired_status}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                        Kuzatuvchi shaxs | Сопровождающее лицо | Accompanying person
                        </th>
                        <td>
                         {{ $konf->accompanying_person }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                        Izohlar | Комментарии | Comments
                        </th>
                        <td>
                         {{ $konf->comments}}
                        </td>
                    </tr>
                     <tr>
                        <th>
                        To'langanmi? | Это было оплачено? | Has it been paid?
                        </th>
                        <td>
                        @if($konf->tolov == 0)
                            <button style="margin: auto; width: 100%; height: 40px;" type="button" class="btn btn-block btn-danger btn-xs">To'lanmagan yoki ko'rib chiqilayotgan | Не оплачено или на рассмотрении | Not paid or under consideration</button>
                            @else
                            <button style="margin: auto; width: 100%; height: 40px;" type="button" class="btn btn-block btn-success btn-xs">To'lov qabul qilindi | Платеж принят | Payment accepted</button>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <th>
                        To'lov bo'yicha ma'lumot | Платежная информация | Payment information
                        </th>
                        <td>
                        @if($konf->tolov_info == '')
                        <div class="alert alert-info" role="alert">
                        Sizga hali xabar yuborilmagan! | You have not been notified yet! | Вы еще не получили уведомления!
                        </div>

                            @else
                            <div class="alert alert-primary" role="alert">
                            Sizda xabar mavjud! У вас есть сообщение! | You have a message! :  {{$konf->tolov_info}}
                        </div>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <th>
                        Anketa holati | Статус анкеты | Questionnaire status
                        </th>
                        <td>
                        @if($konf->hato_bormi == 0)
                            <button style="margin: auto; width: 100%; height: 40px;" type="button" class="btn btn-block btn-warning btn-xs">Ko'rib chiqilmoqda | Под следствием | Under sledstviem</button>
                            @elseif($konf->hato_bormi == 1)
                            <button style="margin: auto; width: 100%; height: 40px;" type="button" class="btn btn-block btn-success btn-xs">Anketada xato yo'q | В анкете нет ошибки | There is no error</button>
                            @else
                            <button style="margin: auto; width: 100%; height: 40px;" type="button" class="btn btn-block btn-danger btn-xs">Anketada xato bor | Ошибка в анкете | There is an error</button>
                            @endif

                            @if($konf->hato_bormi == 2)

                            <div class="alert alert-danger" role="alert">
                            {{ $konf->hatolarni_infosi }}
                            </div>

                            @endif
                        </td>
                    </tr>

                    <tr>
                        <th>
                        Yuklangan fayl | Загруженный файл | Uploaded file
                        </th>
                        <td>
                        @if($konf->file_pdf)
                        <a href="{{ url('/storage') }}/{{ $konf->file_pdf }}"><button style="margin-bottom: 20px;" type="button" class="btn btn-primary">First pdf: {{ $konf->file_pdf }}</button></a>
                        @endif
                        <br>
                      <!--   @if($konf->file_zip)
                        <a href="{{ url('/storage') }}/{{ $konf->file_zip }}"><button type="button" class="btn btn-info">Last zip: {{ $konf->file_zip }}</button></a>
                        @endif -->
                        </td>
                    </tr>



                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                Ro'yxatga qaytish!
            </a>
        </div>


    </div>
</div>
@endsection