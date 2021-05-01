@if(count($attachments)>0)
<?php $i = 1; ?>
@foreach($attachments as $attachment)

<div style="list-style:none; margin-left:0px;" class="removeClass">
    <div class="d-flex justify-content-left">
        <span class="my-4">
            <span class="mr-4">
                <?php echo $i; ?>
            </span>
            <a href="{{url('public/Sales/Item/')}}/{{$attachment->attachment_file}}"
                target="_blank">{{$attachment->attachment_file}}</a>
        </span>
        <span class="ml-auto">
            <button type="button" class="btn btn-danger btn-circle mt-3"
                onclick='documentRemove("{{$attachment->attachment_id}}")'><i class="fas fa-trash-alt"></i></button>
        </span>
        <hr class="m-0 p-0">
    </div>
</div>
<?php $i++; ?>
@endforeach
@endif