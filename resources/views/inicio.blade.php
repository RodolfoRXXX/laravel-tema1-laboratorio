<table width=60% align="left" cellpadding="0" cellspacing="0" border=2>
<tr>
	<td>Codigo</td>
	<td>categoria</td>
	<td>Nombre</td>
	<td>Precio</td>
	<td>Stock</td>
</tr>
@foreach($productos as $producto)
	<tr>
		<td>{{ $producto -> cod_producto }}</td>
		<td>{{ $producto -> cod_categoria }}</td>
		<td>{{ $producto -> nombre }}</td>
		<td>{{ $producto -> precio }}</td>
		<td>{{ $producto -> stock }}</td>
	</tr>
@endforeach
</table>