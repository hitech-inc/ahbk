<table class="table table-responsive" id="textBlocks-table">
    <thead>
        <tr>
            <th>Name</th>
        <th>Text</th>
        <th>Link</th>
        <th>Url</th>
        <th>Label</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($textBlocks as $textBlocks)
        <tr>
            <td>{!! $textBlocks->name !!}</td>
            <td>{!! $textBlocks->text !!}</td>
            <td>{!! $textBlocks->link !!}</td>
            <td>{!! $textBlocks->url !!}</td>
            <td>{!! $textBlocks->label !!}</td>
            <td>
                {!! Form::open(['route' => ['backend.textBlocks.destroy', $textBlocks->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('backend.textBlocks.show', [$textBlocks->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('backend.textBlocks.edit', [$textBlocks->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>