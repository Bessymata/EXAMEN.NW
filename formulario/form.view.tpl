<section class="container">
<h2>{{modeDsc}}</h2>

{{if hasErrores}}
<ul class="error">
{{foreach errores}}
<li>{{this}}</li>
{{endfor errores}}
</ul>
{{endif hasErrores}}

<form action="index.php?page=Mascotas&mode={{mode}}&id={{mascota_id}}" method="post">

<input type="hidden" name="token" value="{{token}}">

<div>
<label>ID</label>
<input type="text" name="mascota_id" value="{{mascota_id}}" readonly>
</div>

<div>
<label>Nombre</label>
<input type="text" name="nombre" value="{{nombre}}" {{readonly}}>
</div>

<div>
<label>Especie</label>
<input type="text" name="especie" value="{{especie}}" {{readonly}}>
</div>

<div>
<label>Edad</label>
<input type="number" name="edad" value="{{edad}}" {{readonly}}>
</div>

<div>
<label>Estado</label>
{{ifnot readonly}}
<select name="estado">
<option value="Activo" {{selectedActivo}}>Activo</option>
<option value="Inactivo" {{selectedInactivo}}>Inactivo</option>
</select>
{{endifnot readonly}}

{{if readonly}}
<input type="text" name="estado" value="{{estado}}" readonly>
{{endif readonly}}
</div>

<div class="actions">
<a href="index.php?page=Mascotas">Cancelar</a>
{{ifnot isDisplay}}
<button type="submit">Confirmar</button>
{{endifnot isDisplay}}
</div>

</form>
</section>