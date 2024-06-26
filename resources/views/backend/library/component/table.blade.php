
@if(!$data)
<h1 style="text-align:center;">Nothing Here</h1>
@elseif($data)
@foreach($data as $value)
<div class="container bootstrap snippets bootdey">
<div class="panel-body inf-content">
<div class="row">
<div class="col-md-4">
<img alt style="width:600px;" title class="img-square img-thumbnail isTooltip" src="{{asset('storage/images/'.$value->image)}}" data-original-title="Usuario">
<ul title="Ratings" class="list-inline ratings text-center">
<a href="{{route('delete.game.library',['product_id'=>$value->id])}}" class="btn btn-info btn-lg play-btn">
  <span class="play-btn"></span> Play        
</a>
<a href="{{route('product.detail',['product_id'=>$value->id])}}" class="btn btn-info btn-lg play-btn">
  <span class="play-btn"></span> Game Detail        
</a>


</ul>
</div>
<div class="col-md-6">
<strong>Information</strong><br>
<div class="table-responsive">
<table class="table table-user-information">
<tbody>
<tr>
<td>
<strong>
Name
</strong>
</td>
<td class="text-primary">
{{$value->name}}
</td>
</tr>
<tr>
<td>
<strong>
Price
</strong>
</td>
<td class="text-primary">
{{$value->old_price}}
</td>
</tr>
<tr>
<td>
<strong>
Category
</strong>
</td>
<td class="text-primary">
{{$value->category->name}}
</td>
</tr>
<tr>
<td>
<strong>
Description
</strong>
</td>
<td class="text-primary">
{{$value->description}}
</td>
</tr>
<tr>
<td>


  
  
<!-- <strong>
<span class="glyphicon glyphicon-eye-open text-primary"></span>
Role
</strong>
</td>
<td class="text-primary">
Admin
</td>
</tr>
<tr>
<td>
<strong>
<span class="glyphicon glyphicon-envelope text-primary"></span>
Email
</strong>
</td>
<td class="text-primary">
<a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="7719180512071b0e37121a161e1b5914181a">[email&#160;protected]</a>
</td>
</tr>
<tr>
<td>
<strong>
<span class="glyphicon glyphicon-calendar text-primary"></span>
created
</strong>
</td>
<td class="text-primary">
20 jul 20014
</td>
</tr>
<tr>
<td>
<strong>
<span class="glyphicon glyphicon-calendar text-primary"></span>
Modified
</strong>
</td>
<td class="text-primary">
20 jul 20014 20:00:00
</td>
</tr> -->
</tbody>

</table>
<strong>Add Your Review</strong><hr style="border-top: 1px solid red;">
<form action="{{route('add.review',['product_id'=>$value->id])}}" method="post">
@csrf
  <input class="form-control" type="text" name="review" class="message">
  <br>
  <div class="inputBox">
  <input type="submit" value="Submit">
  </div>
</form>
</div>
</div>
</div>
</div>

</div>

@endforeach
@endif
