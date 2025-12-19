<section class="WWList">
<table>
<thead>
<tr>
<th>ID</th>
<th>Nombre</th>
<th>Especie</th>
<th>Edad</th>
<th>Estado</th>
<th>
<a href="index.php?page=Mascotas&mode=INS">Nueva</a>
</th>
</tr>
</thead>

<tbody>
{{foreach mascotas}}
<tr>
<td>{{mascota_id}}</td>
<td>{{nombre}}</td>
<td>{{especie}}</td>
<td>{{edad}}</td>
<td>{{estado}}</td>
<td>
<a href="index.php?page=Mascotas&mode=UPD&id={{mascota_id}}">Editar</a>
<a href="index.php?page=Mascotas&mode=DEL&id={{mascota_id}}">Eliminar</a>
<a href="index.php?page=Mascotas&mode=DSP&id={{mascota_id}}">Ver</a>
</td>
</tr>
{{endfor mascotas}}
</tbody>

<tfoot>
<tr>
<td colspan="6">Total: {{total}}</td>
</tr>
</tfoot>
</table>
</section>
