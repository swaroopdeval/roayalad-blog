(function(e) {
 var i = 0;
  var b = 2;
  var id = 0;
  var iteration = 1;
  $(document).ready(function() {

    console.log('Create');

      $('.js-example-basic-multiple').select2();
      
    $(document).on('click', '.moreinput_field',  function () {
      console.log('clicked');
    var content = `<div class="input-group mt-3" id="field${iteration}">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text br-15"><i class="fa fa-tags"></i></span>
                                    </div>
                                    <input type="text" placeholder="atribute name" name="params_name[]" id="field${iteration}" class="form-control" />
                                    <input type="text" placeholder="atribute value name="params_value[]" "id="field2" class="form-control" />
                                    <a class="btn btn-secondary btn-sm add_more_input" id="removeInput">
                                        <i class="fa fa-minus-circle"></i>
                                    </a>
                                    
                  </div>
     `;
        var parsedContent = new DOMParser().parseFromString(content, 'text/html').body.firstChild;
        $(this).after(parsedContent);
        iteration++;
    })
  });

 $(document).on('click', '#removeInput', function(e){

    e = e || window.event;
    e.target.closest('.input-group').remove();
    console.log(e.target.closest('.input-group'))
 })

 $('#add_more').on('click', function(){
      console.log('Added block');
      var html =`  <div class="card-body" id="add_info${i}">
                      <form>
                        <div id="dynamic_container">
                          <small id="bidder">Bidder ${b}</small>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text br-15"><i class="fa fa-tags"></i></span>
                            </div>
                            <input type="text" placeholder="Bidders Name" name="bidders_name[]" class="form-control"/>
                          </div>
                          <div class="input-group mt-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text br-15"><i class="fa fa-tags"></i></span>
                            </div>
                            <input type="text" placeholder="atribute name" name="params_name[]" id="field1" class="form-control"/>
                            <input type="text" placeholder="atribute value" name="params_value[]" id="field2"  class="form-control"/>
                            <a class="btn btn-secondary btn-sm more_input moreinput_field" id="add_more_input${id}">
                            <i class="fa fa-plus-circle"></i> 
                            </a>
                          </div>
                          <a class="btn btn-danger btn-sm" id="remove-more"><i class="fa fa-trash"></i></a>
                        </div>
                      </form>
                    </div>`;

        var parsedContentCard = new DOMParser().parseFromString(html, 'text/html').body;
        i++;
        b++;
        id++;
        
        $('#card-footer').before(html);
     
});



$(document).on('click', '#remove-more', function(){
 
  $(this).parent().prev().remove();
  $(this).parent().remove()

})
 
}())