<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>{{Auth::user()->name}}</title>

    <style>
      .clearfix:after {
  content: "";
  display: table;
  clear: both;
}

a {
  color: #5D6975;
  text-decoration: underline;
}

body {
  position: relative;
  margin: 0 auto; 
  color: #001028;
  background: #FFFFFF; 
  font-family: Arial, sans-serif; 
  font-size: 12px; 
  font-family: Arial;
}

header {
  padding: 10px 0;
  margin-bottom: 30px;
}

#logo {
  text-align: center;
  margin-bottom: 10px;
}

#logo img {
  border: 2px solid #848484;
  border-radius: 5px;
  width: 150px;
}

h1 {
  border-top: 1px solid  #5D6975;
  border-bottom: 1px solid  #5D6975;
  color: #5D6975;
  font-size: 2.4em;
  line-height: 1.4em;
  font-weight: normal;
  text-align: center;
  margin: 0 0 20px 0;
  background-image: url('dimension.png');
}

#project {
  float: left;
}

#project span {
  color: #5D6975;
  text-align: right;
  width: 52px;
  margin-right: 10px;
  display: inline-block;
  font-size: 0.8em;
}

#company {
  float: right;
  text-align: right;
}

#project div,
#company div {
  white-space: nowrap;        
}

table {
  width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
  margin-bottom: 20px;
}

table tr:nth-child(2n-1) td {
  background: #F5F5F5;
}

table th,
table td {
  text-align: center;
}

table th {
  padding: 5px 20px;
  color: #5D6975;
  border-bottom: 1px solid #C1CED9;
  white-space: nowrap;        
  font-weight: normal;
}

table .service,
table .desc {
  text-align: left;
}

table td {
  padding: 20px;
  text-align: right;
}

table td.service,
table td.desc {
  vertical-align: top;
}

table td.unit,
table td.qty,
table td.total {
  font-size: 1.2em;
}

table td.grand {
  border-top: 1px solid #5D6975;;
}

#notices .notice {
  color: #5D6975;
  font-size: 1.2em;
}

footer {
  color: #5D6975;
  width: 100%;
  height: 30px;
  position: absolute;
  bottom: 0;
  border-top: 1px solid #C1CED9;
  padding: 8px 0;
  text-align: center;
}

#img
{
  width: 100px;
}

</style>

  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="{{asset("images/TS.PNG")}}">
      </div>
      <h1>Compra#: {{$canti}}</h1>
      <div id="company" class="clearfix">
        <div>TecShop</div>
        <div>Culiacan, Sinaloa, Mexico</div>
        <div>(667) 123-4567</div>
        <div><a href="mailto:tecshop2@gmail.com">tecshop2@gmail.com</a></div>
      </div>
      <div id="project">
      
        <div><span>CLIENTE</span>{{Auth::user()->name}}</div>
        <div><span>DOMICILIO</span> </div>
        <div><span>EMAIL</span> {{Auth::user()->email}}<a href="mailto:{{Auth::user()->email}}"></a></div>
     
      </div>
    </header> <br> <br> <br> <br>
      <table>
        <thead>
          <tr>
            <th class="service"> Producto</th>
            <th class="desc"> Imagen</th>
            <th>PRECIO</th>
            <th>CANTIDAD</th>
            <th>TOTAL</th>
          </tr>
        </thead>
        <tbody>
        @foreach($compra as $c)
          <tr>
            <td class="service">{{$c->name}}</td>
            <td class="desc"><img id="img" src="{{asset("images/productos")}}/{{$c->imagen}}" alt=""></td>
            <td class="unit">${{$c->precio}}.00</td>
            <td class="qty">{{$c->cantidad}}</td>
            <td class="total">${{$c->totalapagar}}</td>
          </tr>
        @endforeach

          <tr>
            <td colspan="4">SUBTOTAL</td>
            <td class="total">${{$cantidadT}}.00</td>
          </tr>
          <tr>
            <td colspan="4">IVA</td>
            <td class="total">$0.00</td>
          </tr>
          <tr>
            <td colspan="4" class="grand total">TOTAL</td>
            <td class="grand total">${{$cantidadT}}.00</td>
          </tr>
        </tbody>
      </table>
      <div id="notices">
        <div>NOTICIA:</div>
        <div class="notice">Gracias a esta compra ayudas al TELETON.</div>
      </div>
    <footer>
      Gracias por su compra. ¡Usted ha tomado una excelente decision!.
    </footer>
  </body>
</html>