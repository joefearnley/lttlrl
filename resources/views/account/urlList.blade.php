@extends('layouts.app')

@section('content')
    <div id="app" class="container-fluid">
        <div class="row">
            @include('account.nav')
            <div class="col-sm-9 col-md-10">
                <div id="url-list">
                </div>
            </div>
        </div>
        <div id="edit-modal" class="modal fade" tabindex="-1" role="dialog">
        </div>
        <div id="delete-modal" class="modal fade" tabindex="-1" role="dialog">
        </div>
    </div>
@endsection

@section('scripts')
<script id="url-list-template" type="x-tmpl-mustache">
    <h2 class="sub-header">Urls</h2>
    <div class="list-group col-sm-12">
    @{{#urls}}
        <div class="list-group-item">
            <div class="row">
                <div class="col-sm-4">
                    <strong>Url:</strong> @{{ url }}<br>
                    <strong>Little Url:</strong> @{{ link }}<br>
                    <strong>Clicks:</strong> @{{ click_count }} <br>
                    Created on <strong>@{{ formatted_date }}</strong>
                </div>
                <div class="col-sm-5">
                    <canvas class="click-chart-@{{ id }}" height="100"></canvas>
                </div>
                <div class="col-sm-3 text-right">
                    <button class="btn btn-primary edit-url" data-id="@{{ id }}"><i class="fa fa-pencil"></i> Edit</button>
                    <button class="btn btn-danger confirm-delete-url" data-id="@{{ id }}"><i class="fa fa-trash"></i> Delete</button>
                </div>
            </div>
        </div>
    @{{/urls}}
    @{{^urls}}
        <h4>No Urls Made Little Yet.</h4>
    @{{/urls}}
    </div>
</script>

<script id="edit-modal-template" type="x-tmpl-mustache">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Edit Url</h4>
            </div>
            <div class="modal-body">
                <form id="edit-url-form">
                    {!! csrf_field() !!}
                    <input type="hidden" class="form-control" name="id" value="@{{ id }}">
                    <div class="form-group">
                        <label id="url-error-message" class="control-label" for="url"></label><br>
                        <input type="text" class="form-control" id="url" name="url" value="@{{ url }}">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default cancel-url-edit" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary save-url ladda-button" data-id="@{{ id }}" data-style="expand-left"><i class="fa fa-btn fa-save"></i> Save</button>
            </div>
        </div>
    </div>
</script>

<script id="delete-modal-template" type="x-tmpl-mustache">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <p>Are you sure you want to delete this url?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default cancel-delete-edit" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger delete-url ladda-button" data-id="@{{ id }}" data-style="expand-left"><i class="fa fa-btn fa-trash"></i> Delete</button>
            </div>
        </div>
    </div>
</script>

<script src="/js/account/urlList.js"></script>
@endsection
