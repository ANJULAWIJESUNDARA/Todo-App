@extends('layouts.master')

@section('page_title', 'Contact Show')
@section('title', 'Contact Show')
@section('main_item', 'Contact')
@section('sub_item', '')
@section('page-title-breadcrumb', 'Contact ')
@section('page-title-breadcrumb2', 'Contact Show ')
@section('content')
    <br>

    <div class="container">

        <div class="col-md-12">

            <div class="card">
                <div class="card-body">

                    <p class="text-muted mb-3"></p>
                    <table id="" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>

                                <th>First Name</th>
                                <th>Last Name </th>
                                <th>Mobile Number</th>
                                <th> Email</th>
                                <th>Address</th>
                                <th>Image</th>
                                <th>Contact Groups</th>
                                <th style="width: 10%"></th>



                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $contact->first_name }}</td>
                                <td>{{ $contact->last_name }}</td>
                                <td>{{ $contact->mobile_number }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->address }}</td>
                                <td>
                                    @if ($contact->photo)
                                        <img style="width: 50px;height: 50px;object-fit: cover"
                                            src="{{asset($contact->photo)}}" alt="">
                                    @else
                                        <img src="{{ asset('img/placeholder.jpg')}}"
                                            style="width: 50px;height: 50px;object-fit: cover" alt=""
                                            width="115px">
                                    @endif
                                </td>
                                <td>
                                    @php
                                        $contact_groups_has_contacts = App\Models\ContactGroupsHasContacts::where('contact_id' ,$contact->id)->get();
                                    @endphp
                                    @if(!empty($contact_groups_has_contacts))
                                    @foreach ( $contact_groups_has_contacts as $contact_groups_has_contact )
                                    <span class="badge badge-primary">
                                        {{$contact_groups_has_contact->group->name}}
                                    </span><br>
                                    @endforeach
                                    @else

                                    @endif
                                </td>
                                <td style="text-align: center;">

                                    <span class="mr-2"> <a href="{{ route('contacts.edit', $contact) }}"><i
                                            class="fa fa-edit"></i></span> </a>
                                    <span> <a href="{{ route('contacts.delete', $contact) }} "><i class="fa fa-trash"
                                                aria-hidden="true"></i></span></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>
                <!--end card-body-->
            </div>
        </div>
    </div>

@endsection
