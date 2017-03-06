@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <p><b>Total number of tickets generated :</b> {{ $total_ticket_count }}</p>
                                <p><b>Total Male :</b> {{ $total_male }}</p>
                                <p><b>Total Female :</b> {{ $total_female }}</p>
                                <p><b>Total On Spot registration:</b> {{ $on_spot_count }}  <b><i class="fa fa-male fa-lg" aria-hidden="true"></i> : </b>{{$on_spot_male}} <b><i class="fa fa-female fa-lg" aria-hidden="true"></i> : </b>{{$on_spot_female}}</p>
                            </div>
                            <div class="col-md-6">
                                <p><b>Total Male in venue:</b> {{ $male_in_venue }}</p>
                                <p><b>Total Female in venue:</b> {{ $female_in_venue }}</p>
                                <p><b>Total VIP in venue:</b> {{ $vip_in_venue }}</p>
                                <p><b>Total Crowd :</b>{{ $total_crowd }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading text-center"><b>Requested Tickets</b></div>

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr> 
                                    <th style="width: 100px;">Reg-ID</th> 
                                    <th>Name</th> 
                                    <th style="width: 130px;">Phone</th> 
                                    <th>Email</th>
                                    <th style="width: 150px;">Created</th>
                                    <th style="width: 150px;">Barcode</th>
                                    @if (Auth::user()->email == 'nhevan@gmail.com')
                                        <th style="width: 150px;">Actions</th>
                                    @endif
                                </tr> 
                            </thead> 
                            <tbody>
                                @foreach ($tickets as $ticket)
                                    <tr>
                                        <td>{{ $ticket->reg_id }}</td>
                                        <td>{{ $ticket->name }}</td>
                                        <td>{{ $ticket->phone }}</td>
                                        <td>{{ $ticket->email }}</td>
                                        <td>{{ $ticket->created_at }}</td>
                                        <td><img src="data:image/png;base64,{{ $ticket->barcode }}" style="width: 100%; height: 50px;"/></td>
                                        @if (Auth::user()->email == 'nhevan@gmail.com')
                                            <td class="text-center"> 
                                                <a href="{{ route('ticket.resend', ['id' => $ticket->id]) }}" style="color:darkblue;"><i class="fa fa-envelope fa-lg fa-danger" style="padding: 15px;"></i></a> 
                                                <a href="{{ route('ticket.download', ['id' => $ticket->id]) }}" style="color:black;"><i class="fa fa-download fa-lg" style="padding: 15px;"></i></a> 
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center">{{ $tickets->links() }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
