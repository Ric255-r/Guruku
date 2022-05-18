<!-- Bootstrap core JavaScript-->
<script src="{{ URL::asset('/tempuser/temp/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ URL::asset('tempuser/temp/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ URL::asset('/tempuser/temp/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ URL::asset('/tempuser/temp/js/sb-admin-2.min.js') }}"></script>

<!-- Page level plugins -->
<script src="{{ URL::asset('/tempuser/temp/vendor/chart.js/Chart.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ URL::asset('/tempuser/temp/js/demo/chart-area-demo.js') }}"></script>
<script src="{{ URL::asset('/tempuser/temp/js/demo/chart-pie-demo.js') }}"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function(){
        $('#dataTable').dataTable();
    });
</script>


<script>
    jQuery(document).ready(function($){
        $('#mymodal4').on('show.bs.modal',function(e){
            var button = $(e.relatedTarget);
            var modal = $(this);
            modal.find('.modal-body').load(button.data('remote'));
            modal.find('.modal-title').html(button.data('title'));
        });
    });
</script>

<div class="modal" id="mymodal4" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <i class="fa fa-spinner fa-spin"></i>
            </div>
        </div>
    </div>
</div>
