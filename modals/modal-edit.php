

<div class="modal bottom-sheet" id="modal_edit" style="min-height: 90vh;">
	<div class="modal-footer">
        <button class="modal-close btn-flat" style="font-size:30px;color:#f55353;">
            <b>&times;</b>
        </button>
    </div>
	<div class="modal-content">
		<fieldset style="border:3px solid teal;">
    <legend><h4>Edit Student</h4></legend>
		
		<div class="row">
			<div class="col m12">
					 
					 	 
			
					 	<input type="hidden" name="" id="editID" >
	

 	<div class="input-field col m2 ">
 	 <span for="editFullname">Student Name</span>
 	<input type="text" name="" id="editFullname" >
	</div>

 	<div class="input-field col m2 ">
 	 <span for="editAddress">Address</span>
 	<input type="text" name="" id="editAddress" >
	</div>

	<div class="input-field col m2 ">
 	 <span for="editAge">Age</span>
 	<input type="number" name="" id="editAge" >
	</div>

	<div class="input-field col m2 ">
 	 <span for="editBirthday">Birthday</span>
 	<input type="text" class="datepicker" name="" id="editBirthday" >
	</div>

	<div class="input-field col m2 ">
 	 <span for="editContact">Contact No</span>
 	<input type="number" name="" id="editContact" >
	</div>
					
						<div class="col m12">
				<button class="btn col m3 #006064 cyan darken-3" onclick="update_value()">update</button>
			</div>	
				</div>		
			</div>
			
		</div>
</div>

</fieldset>
