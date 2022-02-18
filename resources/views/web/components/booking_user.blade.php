<div class="col-md-4 ">
    <div class="booking_user">
        <h2>{{$title}}</h2>
        <input type="hidden" name="users[{{$index}}][type]" value="{{$type}}"  >

        <div class="form-group">
            <label for="surname_{{$index}}">Фамилия</label>
            <input type="text" name="users[{{$index}}][surname]"  required class="form-control">
        </div>
        <div class="form-group">
            <label for="">Имя</label>
            <input type="text" class="form-control" name="users[{{$index}}][name]" required >
        </div>
        <div class="form-group gender">
            <input type="radio" name="users[{{$index}}][gender]" value="male" id="option-1_{{$index}}"  checked>
            <label for="option-1_{{$index}}" class="option option-1">Мужчина</label>

            <input type="radio" name="users[{{$index}}][gender]" value="female" id="option-2_{{$index}}">
            <label for="option-2_{{$index}}" class="option option-2">Женщина</label>
        </div>
        <div class="form-group">
            <label for="date_birth_{{$index}}">Дата рождения</label>
            <input type="date" class="form-control" name="users[{{$index}}][date_birth]" id="date_birth_{{$index}}" required>
        </div>
        <div class="form-group">
            <label for="nationality_{{$index}}">Гражданство</label>
            <select class="form-control" name="users[{{$index}}][nationality]" id="nationality_{{$index}}" required>
                <option value="Гражданин Казахстана">Гражданин Казахстана</option>
                <option value="Не гражданин Казахстана">Не гражданин Казахстана</option>
            </select>
        </div>

        <div class="form-group">
            <label for="validity_{{$index}}">Срок действия – если есть</label>
            <input type="date" class="form-control" name="users[{{$index}}][validity]" id="validity_{{$index}}" placeholder="ДД–ММ–ГГГГ">
        </div>
        <div class="form-group">
            <label for="iin_{{$index}}">ИИН – Индивидуальный идентификационный номер</label>
            <input type="text" class="form-control" name="users[{{$index}}][iin]" id="iin_{{$index}}" placeholder="ХХХХХХХХХХХХХХ" >
        </div>
    </div>
</div>
