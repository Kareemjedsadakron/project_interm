<div class="form-row">
    <strong class=" col-form-label">วันที่รับคำร้อง: </strong>
    <div class="col-col-sm-12 col-md-3 col-lg-4">
        <input type="date" name="request" value="{{ isset($support->request) ?  $support->request : '' }}"
            class="form-control" placeholder="" required>
    </div>
   
    <strong class=" col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;วันที่เสร็จ: </strong>
    <div class="col-sm-12 col-md-3 col-lg-4 ">
        <input type="date" name="completion" value="{{ isset($support->completion) ? $support->completion : 'ไม่พบข้อมูล' }}"
            class="form-control" placeholder="" readonly />
    </div>
</div><br>

<div class="form-row">
    <strong class=" col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;บริษัทลูกค้า: </strong>
    <div class="col-sm-12 col-md-3 col-lg-4">
        <input type="text" name="company" value="{{ isset($support->company) ? $support->company : '' }}"
            class="form-control" placeholder="บริษัทลูกค้า" required />
    </div>

    <strong class=" col-form-label"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ชื่อลูกค้า: </strong>
    <div class="col-sm-12 col-md-3 col-lg-4">
        <input type="text" name="name_customer"
            value="{{  isset($support->name_customer) ?  $support->name_customer : '' }}" class="form-control"
            placeholder="ชื่อลูกค้า" required />
    </div>
</div><br>

<div class="form-row">
    <strong class=" col-form-label">เบอร์โทรศัพท์: </strong>
    <div class="col-sm-12 col-md-3 col-lg-4">
        <input type="number" name="telephone" value="{{ isset($support->telephone) ?  $support->telephone : '' }}"
            class="form-control" placeholder="เบอร์โทรศัพท์" required />
    </div>

    <strong class=" col-form-label">ผู้รับผิดชอบ: </strong>
    <div class="col-sm-12 col-md-3 col-lg-4">
        <input type="text" name="responsible" value="{{ isset($support->responsible) ?  $support->responsible : '' }}"
            class="form-control" placeholder="ผู้รับผิดชอบ" required />
    </div>
</div><br>

<div class="form-row">
    <strong class=" col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;อีเมลล์: </strong>
    <div class="col-sm-12 col-md-3 col-lg-4">
        <input type="e-mail" name="email" value="{{ isset($support->email) ? $support->email : '' }}"
            class="form-control" placeholder="อีเมลล์"  />
    </div>

    <strong class=" col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        อื่นๆ: </strong>
    <div class="col-sm-12 col-md-3 col-lg-4">
        <input type="text" name="other" value="{{ isset($support->other) ? $support->other : '-' }}" class="form-control"
            placeholder="อื่นๆ" >
    </div>
</div><br>
<div class="p-3 mb-2 bg-dark text-white">
    <div class="form-row">
        <div class="col-sm-12 col-md-3 col-lg-4">

            <strong class=" col-form-label">&nbsp;&nbsp;&nbsp;
                คำร้องเรียน </strong><br><br>
            <div class="col-sm-12 col-md-12 col-lg-12">
                <input  type="text" name="complaint" value="{{ isset($support->complaint) ? $support->complaint : '' }}" class="form-control"
                    placeholder="คำร้องเรียน" >
                
            </div>

            
        </div>
    </div>
</div><br>
<div>
    <div class="col d-none">
    <strong>เพิ่มรูป: </strong>
    
        <input type="text" name="support_image"
            value="{{ isset($support->support_image) ?  $support->support_image : '' }}" class="form-control"
            placeholder="เพิ่มรูป" />
    </div><br>
    <div class="form-row  d-none" >
        <strong class=" col-form-label">เลขซัพพอร์ต: </strong>
        <div class="col-sm-12 col-md-3 col-lg-4">
            <input type="text" name="support_number"
                value="{{  isset($support->support_number) ?  $support->support_number : '' }}" class="form-control"
                placeholder="เลขซัพพอต" />
        </div>
    </div>
</div>

   

    <div class="col d-none">
        <input type="text" name="up" value="{{$_SESSION["users"]}}" class="form-control" placeholder="รับค่าอัปดรต" />
      </div>
      
      
     