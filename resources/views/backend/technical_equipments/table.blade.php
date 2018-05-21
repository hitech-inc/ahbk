<table class="table table-responsive" id="technicalEquipments-table">
    <thead>
        <tr>
            <th>Title</th>
        <th>Text</th>
        <th>Img</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($technicalEquipments as $technicalEquipment)
        <tr>
            <td>{!! $technicalEquipment->title !!}</td>
            <td>{!! $technicalEquipment->text !!}</td>
            <td>{!! $technicalEquipment->img !!}</td>
            <td>
                {!! Form::open(['route' => ['technicalEquipments.destroy', $technicalEquipment->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('technicalEquipments.show', [$technicalEquipment->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('technicalEquipments.edit', [$technicalEquipment->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>