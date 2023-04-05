<form action="" method="post" enctype="multipart/form-data">
    <div class="modal fade text-left" id="ModalCreate" tabindex="=-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Keterangan Kategori Penilaian</h4>
                </div>
                {!! Form::open(['url' => '/ubahkategori', 'class' => 'form-horizontal']) !!}
                <div class="modal-body">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            {!! Form::text('keterangan_kategori', '', ['class' => 'form-control', 'id' => 'keterangan_kategori']) !!}
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</form>

{{-- JS KETERANGAN KATEGORI --}}
<script>
    var button = document.getElementsByClassName('buttonLila');
    var inputBox = document.getElementById('keterangan_kategori');

    inputBox.addEventListener('click', function(event) {
        console.log('click')
    })

    for (let i = 0; i < button.length; i++) {
        button[i].addEventListener('click', function(event) {
            inputBox.setAttribute('value', button[i].dataset.peler)
            // console.log(button[i].dataset.peler)
        })
    }
</script>
