var global = new global();
var modal_count = 0;

function global()
{
  init();

  function init()
  {
    document_ready();
  }

  function document_ready()
  {
    $(document).ready(function() {

      global_submit();
      modal_show();
    });
  }
  

  function global_submit()
  {
    $(document).on('submit', '.global-submit', function(e) 
    {
      var action    = $(e.currentTarget).attr('action');
      var data      = $(e.currentTarget).serialize();
      e.preventDefault();
      action_global_submit(action, data);
    });
  }

  function action_global_submit(action, data)
  {
    $.ajax(
    {
      url: action,
      type: 'post',
      data: data,
      dataType:"json",
      success: function(data)
      {
        if(data.response_status == "error")
        {
            // toastr.error(data.message);
            alert(data.message);
        }
          else if(data.status == "error")
          {
              if(!data.message)
              {
                  message = data.status_message;
              }
              else
              {
                  message = data.message;
              }
          }
        else
        {
          if(data.call_function)
          {
             window[data.call_function](data);
          }
          modal_hide();
        }
      },
      error: function(x,t,m)
      {
          // console.log(x + ' ' + t +' ' + m); 
          if(t==="timeout") {
              alert(m);
              // toastr.warning(m);
              setTimeout(function()
              {
                  action_global_submit(link, data);
              }, 2000);
          } 
          else {
              alert('Please Contact The Administrator.');
              // toastr.error(m + '. Please Contact The Administrator.');
          }
      }
    });
  }


  function modal_show()
  {

    $(document).on('click', '.global-modal', function()
    {
      var _url = $(this).attr('url');
      
      $.ajax({
        headers: 
        {
                'X-CSRF-TOKEN': $('meta[name="my-csrf-token"]').attr('content')
        },
        url: _url,
        type: 'POST',
        dataType: 'html',
        data: {},
        success: function(data)
        {
          $('#myModal').modal('toggle');
          $('.modal-content').html(data);
        }
      });
      
      
    });
    
  }

  function modal_hide()
  {
    $('#myModal').modal('hide');
  }
}
  
