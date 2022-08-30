<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
</head>
<body>

    {{--  <div class="row">
        <div class="col-md-6 col-12">
            <strong>التاريخ : </strong>
            <br>
            <span>{{$order->created_at}}</span>
        </div>
        <div class="col-md-6 col-12">
            <strong>المستخدم : </strong>
            <span>{{$order->user->name}}</span>
            <br>
            <strong>الهاتف : </strong>
            <span>{{$order->user->phone}}</span>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <label><strong>المنطقه</strong> : <span>{{$order->regon->name}}</span></label>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <label><strong>العنوان</strong> : <span>{{$order->address}}</span></label>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <label><strong>مواعيد التوصيل</strong> : <span>{{$order->delivery_period}}</span></label>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <label><strong>الاصناف : </strong></label>
        </div>
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <th>#</th>
                    <th>اسم المنتج</th>
                    <th>الكميه</th>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>غسول وجه</td>
                        <td>3</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <label><strong>ملاحظه</strong> : <span>{{$order->note}}</span></label>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <label><strong>تكلفه الطلب</strong> : <span>18000</span></label>
        </div>
        <div class="col-md-12">
            <label><strong>رسوم التوصيل</strong> : <span>{{$order->delivery_cost}}</span></label>
        </div>
        <div class="col-md-12">
            <label><strong>الاجمالي</strong> : <span></span>{{$order->total}}</label>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <label><span>تكلفه التوصيل ثابته لكل المناطق داخل الخرطوم</span></label>
        </div>
    </div>  --}}


<table id="customers">
  <tr>
   <td><h2>
 <?php $image_path = '/icons/P1UfeJ5dFg4YDcfl1a5P9lvZmLL37lPsfjBUJjyb.png'; ?>
  <img src="{{ public_path() . $image_path }}" width="200" height="100"> 

    </h2></td>
    <td><h2>Hasna Store</h2>
<p>AL TIKANA</p>
<p>Phone : 00249920303326</p>
<p>Email : support@easylerningbd.com</p>

    </td> 
  </tr>
  
   
</table>

<table id="customers">
  <tr>
      <th width="45%">الكميه</th>
      <th width="45%">المنتجات</th>
      <th width="10%">رقم</th>
  </tr>
  <tr>
    <td>1</td>
    <td><b>غسول وجه</b></td>
    <td>4</td></td>
  </tr>
   
</table>
<hr>

<div class="row">
    <div class="col-md-6 col-12">
        <strong>التاريخ : </strong>
        <br>
        <span>1/1/2022</span>
    </div>
    <div class="col-md-6 col-12">
        <strong>المستخدم : </strong>
        <span>يوسف محمد</span>
        <br>
        <strong>الهاتف : </strong>
        <span>09999999999</span>
    </div>
</div>

<br> <br>
  <i style="font-size: 10px; float: right;">Print Data : {{ date("d M Y") }}</i>

</body>
</html>
