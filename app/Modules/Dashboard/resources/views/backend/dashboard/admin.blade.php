@extends('backends.layouts.master')
@push('backend-stylesheet')
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="{{ asset('backends/assets/css/components/custom-modal.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('backends/assets/css/scrollspyNav.css')}}" rel="stylesheet" type="text/css" />

@endpush
@section('content')

    <!--  BEGIN CONTENT PART  -->
    <div id="content" class="main-content">
        <div class="layout-px-spacing">

            <div class="page-header">
                <div class="page-title">
                    <h3>@role('admin')
                            Admin
                        @endrole
                        @role('editor')
                            Editor
                        @endrole
                        @role('author')
                            Author
                        @endrole
                        Dashboard</h3>
                </div>
                <div class="dropdown filter custom-dropdown-icon">
                    <a class="dropdown-toggle btn" href="#" role="button" id="filterDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="text"><span>Show</span> : Daily Analytics</span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="filterDropdown">
                        <a class="dropdown-item" data-value="<span>Show</span> : Daily Analytics" href="javascript:void(0);">Daily Analytics</a>
                        <a class="dropdown-item" data-value="<span>Show</span> : Weekly Analytics" href="javascript:void(0);">Weekly Analytics</a>
                        <a class="dropdown-item" data-value="<span>Show</span> : Monthly Analytics" href="javascript:void(0);">Monthly Analytics</a>
                        <a class="dropdown-item" data-value="Download All" href="javascript:void(0);">Download All</a>
                        <a class="dropdown-item" data-value="Share Statistics" href="javascript:void(0);">Share Statistics</a>
                    </div>
                </div>
            </div>
            <div class="row layout-top-spacing">
                <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12 layout-spacing">
                    <div class="widget widget-one">
                        <div class="widget-heading">
                            <h6 class="">Statistics</h6>
                        </div>
                        <div class="w-chart">
                            <div class="w-chart-section">
                                <div class="w-detail">
                                    <p class="w-title">Total Visits</p>
                                    <p class="w-stats">423,964</p>
                                </div>
                                <div class="w-chart-render-one">
                                    <div id="total-users"></div>
                                </div>
                            </div>

                            <div class="w-chart-section">
                                <div class="w-detail">
                                    <p class="w-title">Paid Visits</p>
                                    <p class="w-stats">7,929</p>
                                </div>
                                <div class="w-chart-render-one">
                                    <div id="paid-visits"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                    <div class="row widget-statistic">
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                            <div class="widget widget-one_hybrid widget-followers">
                                <div class="widget-heading">
                                    <div class="w-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                    </div>
                                    <p class="w-value">{{ $post_count}}</p>
                                    <h5 class="">Active Posts</h5>
                                </div>
                                <div class="widget-content">
                                    <div class="w-chart">
                                        <div id="hybrid_followers"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                            <div class="widget widget-one_hybrid widget-referral">
                                <div class="widget-heading">
                                    <div class="w-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-link"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path></svg>
                                    </div>
                                    <p class="w-value">{{ $category_count}}</p>
                                    <h5 class="">Active Categories</h5>
                                </div>
                                <div class="widget-content">
                                    <div class="w-chart">
                                        <div id="hybrid_followers1"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                            <div class="widget widget-one_hybrid widget-engagement">
                                <div class="widget-heading">
                                    <div class="w-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
                                    </div>
                                    <p class="w-value">{{ $posts_per_day}}</p>
                                    <h5 class="">Total Active Posts Today</h5>
                                </div>
                                <div class="widget-content">
                                    <div class="w-chart">
                                        <div id="hybrid_followers3"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                    <div class="widget widget-activity-three">

                        <div class="widget-heading">
                            <h5 class="">Top 10 Posts</h5>
                        </div>

                        <div class="widget-content">

                            <div class="mt-container mx-auto">
                                <div class="timeline-line">

                                    <div class="item-timeline timeline-new">
                                        <div class="t-dot">
                                            <div class="t-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg></div>
                                        </div>
                                        <div class="t-content">
                                            <div class="t-uppercontent">
                                                <h5>Logs</h5>
                                                <span class="">27 Feb, 2020</span>
                                            </div>
                                            <p><span>Updated</span> Server Logs</p>
                                            <div class="tags">
                                                <div class="badge badge-primary">Logs</div>
                                                <div class="badge badge-success">CPanel</div>
                                                <div class="badge badge-warning">Update</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="item-timeline timeline-new">
                                        <div class="t-dot">
                                            <div class="t-success"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg></div>
                                        </div>
                                        <div class="t-content">
                                            <div class="t-uppercontent">
                                                <h5>Mail</h5>
                                                <span class="">28 Feb, 2020</span>
                                            </div>
                                            <p>Send Mail to <a href="javascript:void(0);">HR</a> and <a href="javascript:void(0);">Admin</a></p>
                                            <div class="tags">
                                                <div class="badge badge-primary">Admin</div>
                                                <div class="badge badge-success">HR</div>
                                                <div class="badge badge-warning">Mail</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="item-timeline timeline-new">
                                        <div class="t-dot">
                                            <div class="t-danger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg></div>
                                        </div>
                                        <div class="t-content">
                                            <div class="t-uppercontent">
                                                <h5>Task Completed</h5>
                                                <span class="">01 Mar, 2020</span>
                                            </div>
                                            <p>Backup <span>Files EOD</span></p>
                                            <div class="tags">
                                                <div class="badge badge-primary">Backup</div>
                                                <div class="badge badge-success">EOD</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="item-timeline timeline-new">
                                        <div class="t-dot">
                                            <div class="t-warning"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg></div>
                                        </div>
                                        <div class="t-content">
                                            <div class="t-uppercontent">
                                                <h5>Collect Docs</h5>
                                                <span class="">10 Mar, 2020</span>
                                            </div>
                                            <p>Collected documents from <a href="javascript:void(0);">Sara</a></p>
                                            <div class="tags">
                                                <div class="badge badge-success">Collect</div>
                                                <div class="badge badge-warning">Docs</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="item-timeline timeline-new">
                                        <div class="t-dot">
                                            <div class="t-dark"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-server"><rect x="2" y="2" width="20" height="8" rx="2" ry="2"></rect><rect x="2" y="14" width="20" height="8" rx="2" ry="2"></rect><line x1="6" y1="6" x2="6" y2="6"></line><line x1="6" y1="18" x2="6" y2="18"></line></svg></div>
                                        </div>
                                        <div class="t-content">
                                            <div class="t-uppercontent">
                                                <h5>Reboot</h5>
                                                <span class="">06 Apr, 2020</span>
                                            </div>
                                            <p>Server rebooted successfully</p>
                                            <div class="tags">
                                                <div class="badge badge-warning">Reboot</div>
                                                <div class="badge badge-primary">Server</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                    <div class="widget widget-card-four">
                        <div class="widget-content">
                            <div class="w-content">
                                <div class="w-info">
                                    <h6 class="value">$ 45,141</h6>
                                    <p class="">Expenses</p>
                                </div>
                                <div class="">
                                    <div class="w-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                    </div>
                                </div>
                            </div>
                            <div class="progress">
                                <div class="progress-bar bg-gradient-secondary" role="progressbar" style="width: 57%" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                    <div class="widget-four">
                        <div class="widget-heading">
                            <h5 class="">Visitors by Browser</h5>
                        </div>
                        <div class="widget-content">
                            <div class="vistorsBrowser">
                                <div class="browser-list">
                                    <div class="w-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chrome"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="4"></circle><line x1="21.17" y1="8" x2="12" y2="8"></line><line x1="3.95" y1="6.06" x2="8.54" y2="14"></line><line x1="10.88" y1="21.94" x2="15.46" y2="14"></line></svg>
                                    </div>
                                    <div class="w-browser-details">
                                        <div class="w-browser-info">
                                            <h6>Chrome</h6>
                                            <p class="browser-count">65%</p>
                                        </div>
                                        <div class="w-browser-stats">
                                            <div class="progress">
                                                <div class="progress-bar bg-gradient-primary" role="progressbar" style="width: 65%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="browser-list">
                                    <div class="w-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-compass"><circle cx="12" cy="12" r="10"></circle><polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"></polygon></svg>
                                    </div>
                                    <div class="w-browser-details">
                                        <div class="w-browser-info">
                                            <h6>Safari</h6>
                                            <p class="browser-count">25%</p>
                                        </div>
                                        <div class="w-browser-stats">
                                            <div class="progress">
                                                <div class="progress-bar bg-gradient-danger" role="progressbar" style="width: 35%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="browser-list">
                                    <div class="w-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>
                                    </div>
                                    <div class="w-browser-details">
                                        <div class="w-browser-info">
                                            <h6>Others</h6>
                                            <p class="browser-count">15%</p>
                                        </div>
                                        <div class="w-browser-stats">
                                            <div class="progress">
                                                <div class="progress-bar bg-gradient-warning" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal animated zoomInUp" id="userPasswordChangeModal" tabindex="-1" role="dialog" aria-labelledby="userPasswordChangeLabel" aria-hidden="true">
                </div>
            </div>

        </div>
    </div>
@endsection
@push('backend-scripts')

{{-- Auth User Password Change Modal --}}
<script>
    $(document).on('click','.changeUserPassword',function (e) {
        e.preventDefault();
        var user_id =  $('.changeUserPassword').data('id');
        var showUrl = "{{ route('backend.userPasswordChange',':id')}}";
        showUrl =  showUrl.replace(":id",user_id);
        $.ajax({
            url: showUrl,
            success:function(resp){
                $("#userPasswordChangeModal").modal('show');
                $("#userPasswordChangeModal").html(resp);
            }
        });
    });
</script>


{{-- Check Current Password Live --}}
<script>
    $(document).on('keyup',"#currentPassword",function(e){
        e.preventDefault();
        var data =  $('#currentPassword').val();
        checkUrl = "{{route ('backend.passwordCheck')}}";
        $.ajaxSetup({
            headers:
            { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  }
        });
        $.ajax({
            type: "POST",
            url: checkUrl,
            data:{'current_password' : data},
            dataType: "json",
            success: function(response){
                var el = $(document).find('[class ="current_password"]');
                if (response.status == 'success'){
                    if(el.length){
                        el.empty();
                    }
                    el.append($('<span style="color: green;">' + response.message + '</span>'));
                }else{
                    if(el.length){
                        el.empty();
                    }
                    el.append($('<span style="color: red;">' + response.message + '</span>'));
                }
            },
            error: function(response){
                alert('error');
            }
        });
    });
</script>


{{-- Auth User Password Change Update --}}
<script>
    $(document).on('submit','#newPasswordSubmit',function(e){
        e.preventDefault();
        var id = $('#newPasswordSubmit').data('id');
        //alert(id);
        var submitUrl = "{{route('backend.userPasswordSubmit')}}";
        var form = $('#newPasswordSubmit')[0];
        var data = new FormData(form);
        $.ajaxSetup({
            headers:
            { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  }
        });
        $.ajax({
            type: "POST",
            url: submitUrl,
            data: data,
            dataType: "json",
            processData: false,
            contentType: false,
            success: function(response){
                // console.log(response);
                $("#userPasswordChangeModal").modal('hide');
                const toast = swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 2000,
                    padding: '1em'
                });
                toast({
                    type: response.status,
                    title: response.message,
                    padding: '1em',
                });
            },
            error: function(response){
                if(response.status == 422){
                    $.each(response.responseJSON.errors, function (i, error) {
                        var el = $(document).find('[class ="' + i + '"]');
                        if(el.length){
                            el.empty();
                        }
                        el.append($('<span style="color: red;">' + error[0] + '</span>').fadeOut(5000));
                    });
                }
                if(response.status == 406){
                    var el = $(document).find('[class = current_password]');
                    if(el.length){
                        el.empty();
                    }
                    el.append($('<span style="color: red;">' + response.responseJSON.message  + '</span>').fadeOut(5000));
                }
            }
        });
    });
</script>

@endpush
