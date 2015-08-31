$(document).ready(function() {
   $("#badbehavior_data").dataTable({
      processing: true,
      serverSide: true,
      deferRender: true,
      select: {
          style: 'single',
          blurable: true
      },
      ajax: "main.php?frame=4&area=dceBadBehavior&ajax_action=get_log_data"
   });
   
   $("#badbehavior_data").on('select.dt', function(e,dt,type,indexes) {
       console.log(dt.rows(indexes).data().toArray());
   });
});