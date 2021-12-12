@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
    Create a new questionnaire
    </div>

    <div class="card-body">
    <form action="{{ route('admin.home.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="title">Sarlavha* | Заголовок | Title</label>
                <select class="form-control" id="type" name="title">
                    <option value="None">None</option>
                    <option value="Prof.">Prof.</option>
                    <option value="Dr.">Dr.</option>
                    <option value="PhD student">PhD student</option>


                </select>
                @if($errors->has('title'))
                    <em class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </em>
                @endif
                <p class="helper-block">

                </p>
            </div>


            <div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
                <label for="first_name">Familya* | Фамилия| Last name </label>
                <input type="text" id="first_name" name="first_name" class="form-control" value="{{ old('first_name', isset($konf) ? $konf->first_name : '') }}" required>
                @if($errors->has('first_name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('first_name') }}
                    </em>
                @endif
                <p class="helper-block">

                </p>
            </div>

            <div class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
                <label for="last_name">Ismi* | Имя | Name </label>
                <input type="text" id="last_name" name="last_name" class="form-control" value="{{ old('last_name', isset($konf) ? $konf->last_name : '') }}" required>
                @if($errors->has('last_name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('last_name') }}
                    </em>
                @endif
                <p class="helper-block">

                </p>
            </div>

            <div class="form-group {{ $errors->has('middle_name') ? 'has-error' : '' }}">
                <label for="middle_name">Sharifi* | Отчество | Middle name </label>
                <input type="text" id="middle_name" name="middle_name" class="form-control" value="{{ old('middle_name', isset($konf) ? $konf->middle_name : '') }}" required>
                @if($errors->has('middle_name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('middle_name') }}
                    </em>
                @endif
                <p class="helper-block">

                </p>
            </div>

            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">Email pochta* | Эл. почта | Email </label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email', isset($konf) ? $konf->email : '') }}" required>
                @if($errors->has('email'))
                    <em class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </em>
                @endif
                <p class="helper-block">

                </p>
            </div>
            <div class="form-group {{ $errors->has('work_phone') ? 'has-error' : '' }}">
                <label for="work_phone">Ishlaydigan telefon* | Рабочий телефон | Work phone</label>
                <input type="text" id="work_phone" name="work_phone" class="form-control" value="{{ old('work_phone', isset($konf) ? $konf->work_phone : '') }}" required>
                @if($errors->has('work_phone'))
                    <em class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </em>
                @endif
                <p class="helper-block">

                </p>
            </div>
            <div class="form-group {{ $errors->has('gender') ? 'has-error' : '' }}">
                <label for="gender">Jinsi* | Пол | Gender</label>
                <!-- <input type="email" id="gender" name="gender" class="form-control" value="{{ old('gender', isset($konf) ? $konf->gender : '') }}" required> -->

                <select class="form-control" id="type" name="gender">



                    <option value="1">Belgilansin -> Erkakga | Изменить -> Мужчине | Change -> To a man</option>

                    <option value="0">Belgilansin -> Ayolga | Изменить -> Женщина | Change -> To a woman</option>


                </select>
                @if($errors->has('gender'))
                    <em class="invalid-feedback">
                        {{ $errors->first('gender') }}
                    </em>
                @endif
                <p class="helper-block">

                </p>
            </div>

            <div class="form-group {{ $errors->has('country') ? 'has-error' : '' }}">
                <label for="country">Davlati* | Государство | Country</label>
                <input type="text" id="country" name="country" class="form-control" value="{{ old('country', isset($konf) ? $konf->country : '') }}" required>
                @if($errors->has('country'))
                    <em class="invalid-feedback">
                        {{ $errors->first('country') }}
                    </em>
                @endif
                <p class="helper-block">

                </p>
            </div>

            <div class="form-group {{ $errors->has('city') ? 'has-error' : '' }}">
                <label for="city">Shaxri* | Город | City</label>
                <input type="text" id="city" name="city" class="form-control" value="{{ old('city', isset($konf) ? $konf->city : '') }}" required>
                @if($errors->has('city'))
                    <em class="invalid-feedback">
                        {{ $errors->first('city') }}
                    </em>
                @endif
                <p class="helper-block">

                </p>
            </div>

            <div class="form-group {{ $errors->has('organization') ? 'has-error' : '' }}">
                <label for="organization">Tashkilot nomi* | Название организации | Name of organization</label>
                <input type="text" id="organization" name="organization" class="form-control" value="{{ old('organization', isset($konf) ? $konf->organization : '') }}" required>
                @if($errors->has('organization'))
                    <em class="invalid-feedback">
                        {{ $errors->first('organization') }}
                    </em>
                @endif
                <p class="helper-block">

                </p>
            </div>
            <div class="form-group {{ $errors->has('position') ? 'has-error' : '' }}">
                <label for="gender">Lavozimi* | Должность | Position</label>

                <select class="form-control" id="type" name="position" >


                <option value="{{ old('position', isset($konf) ? $konf->position : '') }}" selected>{{ old('position', isset($konf) ? $konf->position : '') }}</option>
                    <option value="none" selected>None</option>
                    <option value="Assistant Director">Assistant Director</option>
                    <option value="Assistent">Assistent</option>
                    <option value="Associate Professor">Associate Professor</option>
                    <option value="Bookkeeper">Bookkeeper</option>
                    <option value="Chancellor">Chancellor</option>
                    <option value=">Chief Engineer">Chief Engineer</option>
                    <option value="Chief Expert">Chief Expert</option>
                    <option value="Chief Scientist">Chief Scientist</option>
                    <option value="Councilor">Councilor</option>
                    <option value="Deputy Director on science">Deputy Director on science</option>
                    <option value="Deputy director">Deputy director</option>
                    <option value="Deputy general director">Deputy general director</option>
                    <option value="Director">Director</option>
                    <option value="Editor in Chief">Editor in Chief</option>
                    <option value="Engineer">Engineer</option>
                    <option value="Engineer">Engineer</option>
                    <option value="General director">General director</option>
                    <option value="Head of Chair">Head of Chair</option>
                    <option value="Head of Departament">Head of Departament</option>
                    <option value="Head of Faculty">Head of Faculty</option>
                    <option value="Head of Laboratory">Head of Laboratory</option>
                    <option value="Head of Library">Head of Library</option>
                    <option value="Head of Sector">Head of Sector</option>
                    <option value="Honorary director">Honorary director</option>
                    <option value="Junior Research Scientist">Junior Research Scientist</option>
                    <option value="Leading Engineer">Leading Engineer</option>
                    <option value="Leading Expert">Leading Expert</option>
                    <option value="Leading research officer">Leading research officer</option>
                    <option value="Lecturer">Lecturer</option>
                    <option value="PhD studen">PhD student</option>
                    <option value="President">President</option>
                    <option value="Professor">Professor</option>
                    <option value="Programmer">Programmer</option>
                    <option value="Research Scientist">Research Scientist</option>
                    <option value="Scientific Secretary">Scientific Secretary</option>
                    <option value="Secretariat">Secretariat</option>
                    <option value="Secretary">Secretary</option>
                    <option value="Senior Fellow">Senior Fellow</option>
                    <option value="Senior Research Scientist">Senior Research Scientist</option>
                    <option value="Software Engineer">Software Engineer</option>
                    <option value="Student">Student</option>
                    <option value="Vice-Rector">Vice-Rector</option>
                </select>
                @if($errors->has('position'))
                    <em class="invalid-feedback">
                        {{ $errors->first('position') }}
                    </em>
                @endif
                <p class="helper-block">

                </p>
            </div>
            <div class="form-group {{ $errors->has('academic_degree') ? 'has-error' : '' }}">
                <label for="gender">Akademik ilmiy darajasi* | Ученая степень | Academic degree</label>

                <select class="form-control" id="type" name="academic_degree">

                <option value="{{ old('academic_degree', isset($konf) ? $konf->academic_degree : '') }}" selected>{{ old('academic_degree', isset($konf) ? $konf->academic_degree : '') }}</option>
                <option value="none" selected>None</option>
                    <option value="D.Sc.">D.Sc.</option>
                    <option value="D.Sc. in Agricultural Science">D.Sc. in Agricultural Science</option>
                    <option value="D.Sc. in Biology">D.Sc. in Biology</option>
                    <option value="D.Sc. in Chemistry">D.Sc. in Chemistry</option>
                    <option value="D.Sc. in Cultural Studies">D.Sc. in Cultural Studies</option>
                    <option value="D.Sc. in Economics">D.Sc. in Economics</option>
                    <option value="D.Sc. in Education">D.Sc. in Education</option>
                    <option value="D.Sc. in Geography">D.Sc. in Geography</option>
                    <option value="D.Sc. in Geological Science">D.Sc. in Geological Science</option>
                    <option value="D.Sc. in History">D.Sc. in History</option>
                    <option value="D.Sc. in History of Art">D.Sc. in History of Art</option>
                    <option value="D.Sc. in Laws">D.Sc. in Laws</option>
                    <option value="D.Sc. in Medicine">D.Sc. in Medicine</option>
                    <option value="D.Sc. in Philology">D.Sc. in Philology</option>
                    <option value="D.Sc. in Philosophy">D.Sc. in Philosophy</option>
                    <option value="D.Sc. in Physics and Mathematics">D.Sc. in Physics and Mathematics</option>
                    <option value="D.Sc. in Politics">D.Sc. in Politics</option>
                    <option value="D.Sc. in Sociological Sciences">D.Sc. in Sociological Sciences </option>
                    <option value="D.Sc. in Technical Science">D.Sc. in Technical Science</option>
                    <option value="Doktor">Doktor</option>
                    <option value="Dr. habil.">Dr. habil.</option>
                    <option value="Ph.D.">Ph.D.</option>
                    <option value="Ph.D. in Agricultural Science">Ph.D. in Agricultural Science</option>
                    <option value="Ph.D. in Biology">Ph.D. in Biology</option>
                    <option value="Ph.D. in Chemistry">Ph.D. in Chemistry</option>
                    <option value="Ph.D. in Cultural Studies">Ph.D. in Cultural Studies </option>
                    <option value="Ph.D. in Economics">Ph.D. in Economics</option>
                    <option value="Ph.D. in Education">Ph.D. in Education</option>
                    <option value="Ph.D. in Geography">Ph.D. in Geography</option>
                    <option value="Ph.D. in Geological Science">Ph.D. in Geological Science</option>
                    <option value="Ph.D. in History">Ph.D. in History</option>
                    <option value="Ph.D. in History of Art">Ph.D. in History of Art</option>
                    <option value="Ph.D. in Laws">Ph.D. in Laws</option>
                    <option value="Ph.D. in Medicine">Ph.D. in Medicine</option>
                    <option value="Ph.D. in Philology">Ph.D. in Philology</option>
                    <option value="Ph.D. in Philosophy">Ph.D. in Philosophy</option>
                    <option value="Ph.D. in Physics and Mathematics">Ph.D. in Physics and Mathematics</option>
                    <option value="Ph.D. in Politics">Ph.D. in Politics</option>
                    <option value="Ph.D. in Sociological Sciences">Ph.D. in Sociological Sciences </option>
                    <option value="Ph.D. in Technical Science">Ph.D. in Technical Science</option>
                    <option value="Priv.-Doz.">Priv.-Doz.</option>

                </select>
                @if($errors->has('academic_degree'))
                    <em class="invalid-feedback">
                        {{ $errors->first('academic_degree') }}
                    </em>
                @endif
                <p class="helper-block">

                </p>
            </div>

            <div class="form-group {{ $errors->has('desired_status') ? 'has-error' : '' }}">
                <label for="desired_status">Kerakli holati* | Требуемый режим | Required mode </label>
                <input type="text" id="desired_status" name="desired_status" class="form-control" value="{{ old('desired_status', isset($konf) ? $konf->desired_status : '') }}" required>
                @if($errors->has('desired_status'))
                    <em class="invalid-feedback">
                        {{ $errors->first('desired_status') }}
                    </em>
                @endif
                <p class="helper-block">

                </p>
            </div>
            <div class="form-group {{ $errors->has('accompanying_person') ? 'has-error' : '' }}">
                <label for="accompanying_person">Hamroh odam* | сопровождающее лицо | Accompanying person</label>
                <input type="text" id="accompanying_person" name="accompanying_person" class="form-control" value="{{ old('accompanying_person', isset($konf) ? $konf->accompanying_person : '') }}" required>
                @if($errors->has('accompanying_person'))
                    <em class="invalid-feedback">
                        {{ $errors->first('accompanying_person') }}
                    </em>
                @endif
                <p class="helper-block">

                </p>
            </div>



            <div class="form-group {{ $errors->has('comments') ? 'has-error' : '' }}">
                <label for="comments">Izohlar* | Комментарии | Comments</label>
                <input type="text" id="comments" name="comments" class="form-control" value="{{ old('comments', isset($konf) ? $konf->comments : '') }}" required>
                @if($errors->has('comments'))
                    <em class="invalid-feedback">
                        {{ $errors->first('comments') }}
                    </em>
                @endif
                <p class="helper-block">

                </p>
            </div>

            <div class="form-group {{ $errors->has('file_pdf') ? 'has-error' : '' }}">
                <label for="file_pdf">Fayl yuklang Microsoft Word(DOC)* | Загрузить файл Microsoft Word(DOC) | Upload file Microsoft Word(DOC)</label>
                <input type="file" id="file_pdf" name="file_pdf" class="form-control" value="{{ old('file_pdf', isset($konf) ? $konf->file_pdf : '') }}" required>
                @if($errors->has('file_pdf'))
                    <em class="invalid-feedback">
                        {{ $errors->first('file_pdf') }}
                    </em>
                @endif
                <p class="helper-block">

                </p>
            </div>

           <!--  <div class="form-group {{ $errors->has('file_zip') ? 'has-error' : '' }}">
                <label for="file_zip">Fayl yuklang ZIP | Загрузить файл ZIP| Upload file ZIP (shart emas, не обязательно, not necessarily)</label>
                <input type="file" id="file_zip" name="file_zip" class="form-control" value="{{ old('file_zip', isset($konf) ? $konf->file_zip : '') }}">
                @if($errors->has('file_zip'))
                    <em class="invalid-feedback">
                        {{ $errors->first('file_zip') }}
                    </em>
                @endif
                <p class="helper-block">

                </p>
            </div> -->

            <div style="margin-top: 60px; ">
                <input class="btn btn-success" type="submit" value="Yuborish | Отправить | Send">
            </div>
        </form>


    </div>
</div>
@endsection