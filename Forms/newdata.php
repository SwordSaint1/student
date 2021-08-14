<fieldset style="border:3px solid teal;">
    <legend><h4>Register Student</h4></legend>

<div class="col l12 m12 s12">
  
    <div class="input-field col l4 m4 s12">
        <input type="text" id="full_name" placeholder="Full Name" autocomplete="OFF">
    </div>

  
    <div class="input-field col l4 m4 s12">
        <input type="text" id="address" placeholder="Address" autocomplete="OFF">
    </div>

    <div class="input-field col l4 m4 s12">
        <input type="number" id="age" placeholder="Age" autocomplete="OFF">
    </div>
    <div class="input-field col l4 m4 s12">
        <input type="text" class="datepicker" id="birthday" placeholder="Birthday">
    </div>
    <div class="input-field col l4 m4 s12">
        <input type="number" id="contact_no" placeholder="Contact No." autocomplete="OFF">
    </div>

   

    <div class="row col s12">
        <div class="input-field col l4 m4 s12">
            <button class="btn teal lighten-2 col s12" onclick="save()" id="planBtnCreate">submit</button>
        </div>

        <div class="input-field col l4 m4 s12">
            <p id="status_create" style="font-weight:bold;color:red;"></p>
        </div>
        <!-- LOADER -->
        <div class="col s12">
            <div class="progress" id="loader" style="display:none;">
                <div class="indeterminate #263238 blue-grey darken-4"></div>
            </div>
        </div>
    </div>
</div>

</fieldset>
<script type="text/javascript">
     $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
        autoClose: true
    });
</script>
