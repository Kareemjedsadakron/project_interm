
<div class="form-row">
  <strong class=" col-form-label">&nbsp;วันที่สั่งงาน :</strong>
  <div class="col-sm-12 col-md-3 col-lg-4">
      <input type="date" name="new_order" value="{{ isset($order->new_order) ?  $order->new_order : '' }}"
          class="form-control" placeholder="new_order here..." required>
  </div>

  <strong class=" col-form-label">วันที่ส่งของ :</strong>
  <div class="col-sm-12 col-md-3 col-lg-4">
      <input type="date" name="delivery" value="{{ isset($order->delivery) ?  $order->delivery : '' }}"
          class="form-control" placeholder="delivery here..." required>
  </div>
</div><br>

<div class="form-row">
  <strong class=" col-form-label">บริษัทลูกค้า :</strong>
  <div class="col-sm-12 col-md-3 col-lg-4">
      <input type="text" name="company" value="{{ isset($order->company) ?  $order->company : '' }}"
          class="form-control" placeholder="บริษัทลูกค้า" required>
  </div>

  <strong class=" col-form-label"> &nbsp;&nbsp;&nbsp;&nbsp;ชื่อเซลล์ :</strong>
  <div class="col-sm-12 col-md-3 col-lg-4">
      <input type="text" name="cell" value="{{ isset($order->cell) ?  $order->cell : '' }}" class="form-control"
          placeholder="ชื่อเซลล์" required>
  </div>
</div><br><br>

<div class="row">
  <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ติดสติกเกอร์บริษัท : </strong>
  &nbsp;&nbsp;&nbsp;&nbsp;
  @if ($order->company_sticker=='ติดสติกเกอร์')
  <input type="radio" name="company_sticker" value="ติดสติกเกอร์" checked>&nbsp;&nbsp;
  <label class="form-check-label" for="inlineRadio3">
      ติดสติกเกอร์
  </label>
  &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
  <input type="radio" name="company_sticker" value="ไม่ติดสติกเกอร์">&nbsp;&nbsp;
  <label class="form-check-label" for="inlineRadio4">
      ไม่ติดสติกเกอร์
  </label>
  @else
  <input type="radio" name="company_sticker" value="ติดสติกเกอร์">&nbsp;&nbsp;
  <label class="form-check-label" for="inlineRadio3">
      ติดสติกเกอร์
  </label>
  &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;
  <input type="radio" name="company_sticker" value="ไม่ติดสติกเกอร์" checked>&nbsp;&nbsp;
  <label class="form-check-label" for="inlineRadio4">
      ไม่ติดสติกเกอร์
  </label>
  @endif

</div><br>

<div class="row">
  <strong>ติดสติกเกอร์รับประกัน :&nbsp;&nbsp; &nbsp; </strong>
  @if ($order->warranty_sticker=='ติดสติกเกอร์')
  <input type="radio" name="warranty_sticker" value="ติดสติกเกอร์" checked>&nbsp;&nbsp;
  <label class="form-check-label" for="inlineRadio3">
      ติดสติกเกอร์
  </label>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input type="radio" name="warranty_sticker" value="ไม่ติดสติกเกอร์">&nbsp;&nbsp;
  <label class="form-check-label" for="inlineRadio4">
      ไม่ติดสติกเกอร์
  </label>
  @else
  <input type="radio" name="warranty_sticker" value="ติดสติกเกอร์">&nbsp;&nbsp;
  <label class="form-check-label" for="inlineRadio3">
      ติดสติกเกอร์
  </label>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input type="radio" name="warranty_sticker" value="ไม่ติดสติกเกอร์" checked>&nbsp;&nbsp;
  <label class="form-check-label" for="inlineRadio4">
      ไม่ติดสติกเกอร์
  </label>


  @endif
</div> <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp; &nbsp;
<button type="submit"  class="btn btn-primary" class="pull-right" formaction="{{ url('/') }}/order/{{ $order->id }}">
    <i class="far fa-save"></i>&nbsp;อัปเดต</button><br><br>
<div class="container">



<div class="col d-none">
  <input type="text" name="up" value="{{$_SESSION["users"]}}" class="form-control" placeholder="รับค่าอัปดรต" />
</div>


</div>

