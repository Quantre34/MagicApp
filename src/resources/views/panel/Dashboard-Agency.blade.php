@extends('panel.App')
  @section('content')
      <div class="body-wrapper">
        <div class="container-fluid">
          <div class="d-md-flex align-items-center justify-content-between mb-7">
            <div class="mb-4 mb-md-0">
              <h4 class="fs-6 mb-0">Dashboard</h4>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                  <li class="breadcrumb-item">
                    <a class="text-muted text-decoration-none" href="../main/index.html">Home</a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
              </nav>
            </div>
            <div class="d-flex align-items-center justify-content-between gap-6">
              <select class="form-select border fs-3" aria-label="Default select example">
                <option selected>November 2024</option>
                <option value="1">February 2024</option>
                <option value="2">March 2024</option>
                <option value="3">April 2024</option>
              </select>
              <button class="btn btn-success d-flex align-items-center gap-1 fs-3 py-2 px-9">
                <i class="ti ti-plus fs-4"></i>
                Create
              </button>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-7">
              <div class="card uncover-exciting-enhancements">
                <div class="card-body position-relative z-1 row p-7 py-5">
                  <div class="col-xl-7 col-xxl-6">
                    <p class="mb-6 text-uppercase fs-3 fw-medium text-muted">Uncover Exciting
                      Enhancements</p>
                    <h2 class="mb-6 lh-sm pb-1">Better user experience.
                    </h2>
                    <h6 class="fw-normal">Find additional information in our most recent blog entry.
                    </h6>
                    <div class="hstack gap-9 mt-7 mb-5 pb-1">
                      <div class="hstack gap-2">
                        <div class="round-36 bg-white rounded-circle hstack justify-content-center">
                          <i class="ti ti-user fs-5 text-success"></i>
                        </div>
                        <div>
                          <p class="mb-0 fs-2">Team</p>
                          <h6 class="mb-0 fs-2">Up to 240</h6>
                        </div>
                      </div>
                      <div class="hstack gap-2">
                        <div class="round-36 bg-white rounded-circle hstack justify-content-center">
                          <i class="ti ti-circles-relation fs-5 text-primary"></i>
                        </div>
                        <div>
                          <p class="mb-0 fs-2">Progress</p>
                          <h6 class="mb-0 fs-2">Almost 85%</h6>
                        </div>
                      </div>
                    </div>
                    <a href="javascript:void(0)" class="btn btn-primary fs-3 py-2 fs-3 py-2">Discover updates</a>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="card">
                    <div class="card-body">
                      <div class="hstack justify-content-between py-3">
                        <h5 class="mb-0 fw-medium">Current
                          <br /> Weather
                        </h5>
                        <div class="hstack gap-9">
                          <i class="ti ti-sun text-warning fs-13 flex-shrink-0"></i>
                          <h2 class="mb-0 fw-medium fs-10 hstack align-items-start">28 <span class="text-muted fs-6">°C</span>
                          </h2>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card">
                    <div class="card-body">
                      <div class="hstack justify-content-between py-3">
                        <h5 class="mb-0 fw-medium">Health
                          <br /> Care
                        </h5>
                        <div class="hstack gap-9">
                          <i class="ti ti-heart text-danger fs-13 flex-shrink-0"></i>
                          <h2 class="mb-0 fw-medium fs-10 hstack align-items-start">75</h2>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-5">
              <div class="row">
                <div class="col-md-6">
                  <div class="card text-bg-success">
                    <div class="card-body">
                      <h5 class="text-white fw-normal">{{Lang::get('AdminDashboard.Weekly')}}</h5>
                    </div>
                    <div id="total-profit"></div>
                    <div class="card-body">
                      <h5 class="fs-6 text-white mb-1">43.16%</h5>
                      <h6 class="text-white fw-medium mb-0">Avg. Commission</h6>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card text-bg-primary">
                    <div class="card-body">
                      <h5 class="text-white fw-normal">Total Profit</h5>
                    </div>
                    <div id="total-profit2"></div>
                    <div class="card-body">
                      <h5 class="fs-6 text-white mb-1">24.3K</h5>
                      <h6 class="text-white fw-medium mb-0">New Candidates</h6>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card coverage-bg">
                    <div class="card-body pb-3">
                      <h5 class="text-white fw-normal">Coverage</h5>
                    </div>
                    <div id="coverage"></div>
                    <div class="card-body pt-2">
                      <h5 class="fs-6 text-white mb-1">24.3K</h5>
                      <h6 class="text-white fw-medium mb-0">New Candidates</h6>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card text-bg-secondary">
                    <div class="card-body">
                      <h5 class="text-white fw-normal">Pending Tasks</h5>
                    </div>
                    <div id="pending-tasks"></div>
                    <div class="card-body">
                      <h5 class="fs-6 text-white mb-1">18 Days</h5>
                      <h6 class="text-white fw-medium mb-0">Time to finish</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="card w-100">
                <div class="card-body">
                  <div class="d-flex flex-row">
                    <div>
                      <img src="assets/panel/images/profile/user-1.jpg" alt="user" class="rounded-circle" width="96" />
                    </div>
                    <div class="ps-9">
                      <h3 class="fs-6">Markarn Doe</h3>
                      <h6 class="text-muted fw-normal">Designer</h6>
                      <button class="btn bg-success-subtle text-success">
                        Follow
                      </button>
                    </div>
                  </div>
                  <div class="row mt-4 py-3">
                    <div class="col text-center border-end">
                      <h2>14</h2>
                      <h6 class="text-muted fw-medium mb-0">Photos</h6>
                    </div>
                    <div class="col text-center border-end">
                      <h2>54</h2>
                      <h6 class="text-muted fw-medium mb-0">Videos</h6>
                    </div>
                    <div class="col text-center">
                      <h2>145</h2>
                      <h6 class="text-muted fw-medium mb-0">Tasks</h6>
                    </div>
                  </div>
                </div>
                <div class="card-body border-top">
                  <p class="text-center text-muted mb-9 fs-3 h-65" data-simplebar>
                    Lorem Ipsum is simply dummy text of the printing and type setting industry.
                    Lorem Ipsum has beenorem Ipsum is simply dummy text of the printing
                    and type setting industry.
                  </p>
                  <ul class="list-unstyled hstack justify-content-center gap-9 mb-0">
                    <li>
                      <a class="text-muted link-primary" href="javascript:void(0)">
                        <i class="ti ti-brand-facebook fs-6"></i>
                      </a>
                    </li>
                    <li>
                      <a class="text-muted link-primary" href="javascript:void(0)">
                        <i class="ti ti-brand-twitter fs-6"></i>
                      </a>
                    </li>
                    <li>
                      <a class="text-muted link-primary" href="javascript:void(0)">
                        <i class="ti ti-brand-linkedin fs-6"></i>
                      </a>
                    </li>
                    <li>
                      <a class="text-muted link-primary" href="javascript:void(0)">
                        <i class="ti ti-brand-youtube fs-6"></i>
                      </a>
                    </li>
                    <li>
                      <a class="text-muted link-primary" href="javascript:void(0)">
                        <i class="ti ti-world fs-6"></i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-lg-8">
              <div class="card">
                <div class="card-body pb-0">
                  <div class="d-md-flex no-block align-items-center mb-4">
                    <h4 class="card-title">Product Calculation</h4>
                    <div class="ms-auto">
                      <ul class="list-unstyled mb-0 hstack gap-3">
                        <li>
                          <h6 class="text-muted mb-0 hstack gap-2 fw-medium">
                            <span class="text-bg-info round-10 rounded-circle"></span>2016
                          </h6>
                        </li>
                        <li>
                          <h6 class="text-muted mb-0 hstack gap-2 fw-medium">
                            <span class="text-bg-success round-10 rounded-circle"></span>2023
                          </h6>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div id="product-calculation" class="mx-n2"></div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="card">
                <div class="card-body border-bottom">
                  <h4 class="card-title">Customer Support</h4>
                  <p class="card-subtitle">24 new support ticket request generate</p>
                </div>
                <div class="card-body">
                  <div class="chat-box w-100 h-350" data-simplebar>
                    <!--chat Row -->
                    <ul class="chat-list m-0 p-0">
                      <!--chat Row -->
                      <li class="pb-9 border-bottom">
                        <div class="chat-img d-inline-block align-top">
                          <img src="assets/panel/images/profile/user-5.jpg" alt="user" class="rounded-circle" />
                        </div>
                        <div class="chat-content ps-6 d-inline-block">
                          <h6 class="text-muted text-nowrap fw-medium">James Anderson</h6>
                          <div class="box d-inline-block message fs-3 bg-secondary-subtle">
                            <h6 class="mb-2 fw-medium">It’s Great opportunity to work. I
                              would
                              loveto join the team. 🎉
                            </h6>
                            <h6 class="chat-time text-end mb-0 fw-medium d-block w-100">
                              10:56 am
                            </h6>
                          </div>
                        </div>
                      </li>
                      <!--chat Row -->
                      <li class="py-9 border-bottom">
                        <div class="chat-img d-inline-block align-top">
                          <img src="assets/panel/images/profile/user-7.jpg" alt="user" class="rounded-circle" />
                        </div>
                        <div class="chat-content ps-6 d-inline-block">
                          <h6 class="text-muted text-nowrap fw-medium">Hritik Roshan</h6>
                          <div class="box d-inline-block message fs-3 bg-warning-subtle">
                            <h6 class="mb-2 fw-medium">Sed sed eros quis libero 😆Well we
                              have
                              good budget for the project
                            </h6>
                            <h6 class="chat-time text-end mb-0 fw-medium d-block w-100">
                              10:56 am
                            </h6>
                          </div>
                        </div>
                      </li>
                      <!--chat Row -->
                      <li class="py-9 border-bottom text-end">
                        <div class="chat-content ps-6 d-inline-block">
                          <div class="box d-inline-block message fs-3 bg-info-subtle">
                            <h6 class="mb-2 fw-medium">Whats budget of the new project.
                              Looking forward to hear back</h6>
                            <h6 class="chat-time text-end mb-0 fw-medium d-block w-100">
                              10:58 am
                            </h6>
                          </div>
                        </div>
                      </li>
                      <!--chat Row -->
                      <li class="pt-9">
                        <div class="chat-img d-inline-block align-top">
                          <img src="assets/panel/images/profile/user-7.jpg" alt="user" class="rounded-circle" />
                        </div>
                        <div class="chat-content ps-6 d-inline-block">
                          <h6 class="text-muted text-nowrap fw-medium">Sonu Nigam</h6>
                          <div class="box d-inline-block message fs-3 bg-success-subtle">
                            <h6 class="mb-2 fw-medium">Sed sed eros quis libero Well we have
                              good budget for the project
                            </h6>
                            <h6 class="chat-time text-end m-0 fw-medium d-block w-100">
                              11:00 am
                            </h6>
                          </div>
                        </div>
                      </li>
                      <!--chat Row -->
                    </ul>
                  </div>
                </div>
                <div class="card-body border-top">
                  <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center gap-6 w-85">
                      <a class="position-relative" href="javascript:void(0)">
                        <i class="ti ti-paperclip fs-6"></i>
                      </a>
                      <input type="text" class="bg-transparent form-control fw-medium text-muted border-0 p-0 shadow-none" placeholder="Write a message">
                    </div>
                    <ul class="list-unstyled mb-0 d-flex align-items-center gap-6">
                      <li>
                        <a class="fs-6" href="javascript:void(0)">
                          <i class="ti ti-mood-smile"></i>
                        </a>
                      </li>
                      <li>
                        <a class="fs-6" href="javascript:void(0)">
                          <i class="ti ti-microphone"></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-center mb-7">
                    <h4 class="card-title mb-0">To Do list</h4>
                    <div class="ms-auto">
                      <button class="btn btn-rounded btn-success hstack gap-1" data-bs-toggle="modal" data-bs-target="#myModal">
                        <i class="ti ti-plus fs-6"></i>
                        Add Task
                      </button>
                    </div>
                  </div>
                  <!-- .modal for add task -->
                  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header d-flex align-items-center">
                          <h4 class="modal-title">Add Task</h4>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form>
                            <div class="mb-3">
                              <label class="form-label">Name</label>
                              <input type="text" class="form-control" placeholder="Enter Your Name" />
                            </div>
                            <div class="mb-3">
                              <label class="form-label">Email address</label>
                              <input type="email" class="form-control" placeholder="Enter email" />
                            </div>
                          </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn bg-danger-subtle text-danger" data-bs-dismiss="modal">
                            Close
                          </button>
                          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
                            Submit
                          </button>
                        </div>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <!-- /.modal -->
                  <!-- ============================================================== -->
                  <!-- To do list widgets -->
                  <!-- ============================================================== -->
                  <div class="to-do-widget mt-3 h-460" data-simplebar>
                    <ul class="list-task todo-list mb-0" data-role="tasklist">
                      <li class="border-0 p-0 mb-4" data-role="task">
                        <div class="form-check border-start border-2 border-info ps-9">
                          <input type="checkbox" class="form-check-input ms-0" id="inputSchedule" name="inputCheckboxesSchedule" />
                          <label for="inputSchedule" class="form-check-label ps-3 gap-3 hstack">
                            <h5 class="mb-0 fw-medium">Schedule meeting with</h5>
                          </label>
                        </div>
                        <ul class="assignedto list-inline m-0 ps-5 ms-2 mt-1">
                          <li class="list-inline-item">
                            <img class="rounded-circle" src="assets/panel/images/profile/user-3.jpg" alt="user" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-original-title="Steave" />
                          </li>
                          <li class="list-inline-item">
                            <img class="rounded-circle" src="assets/panel/images/profile/user-4.jpg" alt="user" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-original-title="Jessica" />
                          </li>
                          <li class="list-inline-item">
                            <img class="rounded-circle" src="assets/panel/images/profile/user-6.jpg" alt="user" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-original-title="Priyanka" />
                          </li>
                          <li class="list-inline-item">
                            <img class="rounded-circle" src="assets/panel/images/profile/user-2.jpg" alt="user" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-original-title="Selina" />
                          </li>
                        </ul>
                      </li>
                      <li class="border-0 p-0 mb-4" data-role="task">
                        <div class="form-check border-start border-2 border-danger ps-9 d-flex">
                          <input type="checkbox" class="form-check-input ms-0" id="inputCall" name="inputCheckboxesCall" />
                          <label for="inputCall" class="form-check-label ps-3 gap-3 hstack">
                            <h5 class="mb-0 fw-medium opacity-50 text-decoration-line-through">
                              Give Purchase report to
                            </h5>
                            <span class="badge bg-danger-subtle text-danger rounded-pill">Today</span>
                          </label>
                        </div>
                        <ul class="assignedto list-inline m-0 ps-5 ms-2 mt-1 opacity-50">
                          <li class="list-inline-item">
                            <img class="rounded-circle" src="assets/panel/images/profile/user-8.jpg" alt="user" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-original-title="Priyanka" />
                          </li>
                          <li class="list-inline-item">
                            <img class="rounded-circle" src="assets/panel/images/profile/user-7.jpg" alt="user" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-original-title="Selina" />
                          </li>
                        </ul>
                      </li>
                      <li class="border-0 p-0 mb-4" data-role="task">
                        <div class="form-check border-start border-2 border-secondary ps-9">
                          <input type="checkbox" class="form-check-input ms-0" id="inputBook" name="inputCheckboxesBook" />
                          <label for="inputBook" class="form-check-label ps-3 gap-3 hstack">
                            <h5 class="mb-0 fw-medium opacity-50 text-decoration-line-through">
                              Book flight for holiday
                            </h5>
                          </label>
                        </div>
                        <div class="item-date fs-2 ps-5 ms-2 mt-1 opacity-50 text-muted d-inline-block">
                          26 jun 2023
                        </div>
                      </li>
                      <li class="border-0 p-0 mb-4" data-role="task">
                        <div class="form-check border-start border-2 border-warning ps-9">
                          <input type="checkbox" class="form-check-input ms-0" id="inputForward" name="inputCheckboxesForward" />
                          <label for="inputForward" class="form-check-label ps-3 gap-3 hstack">
                            <h5 class="mb-0 fw-medium">Forward all tasks</h5>
                            <span class="badge bg-warning-subtle text-warning rounded-pill">2
                              weeks</span>
                          </label>
                        </div>
                        <div class="item-date fs-2 ps-5 ms-2 mt-1 text-muted d-inline-block">
                          26 jun 2023
                        </div>
                      </li>
                      <li class="border-0 p-0 mb-4" data-role="task">
                        <div class="form-check border-start border-2 border-secondary ps-9">
                          <input type="checkbox" class="form-check-input ms-0" id="inputRecieve" name="inputCheckboxesRecieve" />
                          <label for="inputRecieve" class="form-check-label ps-3 gap-3 hstack">
                            <h5 class="mb-0 fw-medium">Recieve shipment</h5>
                          </label>
                        </div>
                        <div class="item-date fs-2 ps-5 ms-2 mt-1 text-muted d-inline-block">
                          26 jun 2023
                        </div>
                      </li>
                      <li class="border-0 p-0 mb-4" data-role="task">
                        <div class="form-check border-start border-2 border-success ps-9">
                          <input type="checkbox" class="form-check-input ms-0" id="inputForward2" name="inputCheckboxesd" />
                          <label for="inputForward2" class="form-check-label ps-3 gap-3 hstack">
                            <h5 class="mb-0 fw-medium">Send payment today</h5>
                            <span class="badge bg-success-subtle text-success rounded-pill">3
                              weeks</span>
                          </label>
                        </div>
                        <ul class="assignedto list-inline m-0 ps-5 ms-2 mt-1">
                          <li class="list-inline-item">
                            <img class="rounded-circle" src="assets/panel/images/profile/user-3.jpg" alt="user" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-original-title="Assign to Steave" />
                          </li>
                          <li class="list-inline-item">
                            <img class="rounded-circle" src="assets/panel/images/profile/user-6.jpg" alt="user" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-original-title="Assign to Jessica" />
                          </li>
                          <li class="list-inline-item">
                            <img class="rounded-circle" src="assets/panel/images/profile/user-7.jpg" alt="user" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-original-title="Assign to Selina" />
                          </li>
                        </ul>
                      </li>
                      <li class="border-0 p-0 mb-4" data-role="task">
                        <div class="form-check border-start border-2 border-primary ps-9">
                          <input type="checkbox" class="form-check-input ms-0" id="inputRecieve2" name="inputCheckboxesRecieve" />
                          <label for="inputRecieve2" class="form-check-label ps-3 gap-3 hstack">
                            <h5 class="mb-0 fw-medium">Recieve shipment</h5>
                          </label>
                        </div>
                        <div class="item-date fs-2 ps-5 ms-2 mt-1 text-muted d-inline-block">
                          26 jun 2023
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-4">
              <div class="card">
                <a href="javascript:void(0)">
                  <img class="card-img-top img-responsive" src="assets/panel/images/blog/blog-img1.jpg" alt="Card" />
                </a>
                <div class="card-body">
                  <div class="hstack mb-6">
                    <span class="fs-3 fw-normal">20 May 2024</span>
                    <div class="ms-auto">
                      <a href="javascript:void(0)" class="link hstack gap-1 lh-1 fw-light link-primary fs-3 fw-normal text-muted">
                        <i class="ti ti-message-circle-2 fs-5"></i>3 Comments
                      </a>
                    </div>
                  </div>
                  <h4 class="mb-0">
                    Featured Hydroflora Pots Garden & Outdoors
                  </h4>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="card">
                <a href="javascript:void(0)">
                  <img class="card-img-top img-responsive" src="assets/panel/images/blog/blog-img2.jpg" alt="Card" />
                </a>
                <div class="card-body">
                  <div class="hstack mb-6">
                    <span class="fs-3 fw-normal">20 May 2024</span>
                    <div class="ms-auto">
                      <a href="javascript:void(0)" class="link hstack gap-1 lh-1 fw-light link-primary fs-3 fw-normal text-muted">
                        <i class="ti ti-message-circle-2 fs-5"></i>3 Comments
                      </a>
                    </div>
                  </div>
                  <h4 class="mb-0">
                    Featured Hydroflora Pots Garden & Outdoors
                  </h4>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="card">
                <a href="javascript:void(0)">
                  <img class="card-img-top img-responsive" src="assets/panel/images/blog/blog-img3.jpg" alt="Card" />
                </a>
                <div class="card-body">
                  <div class="hstack mb-6">
                    <span class="fs-3 fw-normal">20 May 2024</span>
                    <div class="ms-auto">
                      <a href="javascript:void(0)" class="link hstack gap-1 lh-1 fw-light link-primary fs-3 fw-normal text-muted">
                        <i class="ti ti-message-circle-2 fs-5"></i>3 Comments
                      </a>
                    </div>
                  </div>
                  <h4 class="mb-0">
                    Featured Hydroflora Pots Garden & Outdoors
                  </h4>
                </div>
              </div>
            </div>
            <div class="col-lg-8">
              <div class="card w-100 overflow-hidden">
                <div class="card-body pb-8">
                  <div class="d-md-flex no-block align-items-center">
                    <h4 class="card-title mb-0">Projects of the Month</h4>
                    <div class="ms-auto">
                      <select class="form-select">
                        <option selected>November</option>
                        <option value="1">February</option>
                        <option value="2">March</option>
                        <option value="3">April</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table stylish-table align-middle text-nowrap">
                    <thead>
                      <tr>
                        <th class="border-bottom fs-3 ps-4">
                          Assigned
                        </th>
                        <th class="border-bottom fs-3">
                          Name
                        </th>
                        <th class="border-bottom fs-3">
                          Posts
                        </th>
                        <th class="border-bottom fs-3 pe-4">
                          Budget
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          <div class="hstack gap-3">
                            <span class="round-48 rounded-circle overflow-hidden bg-danger-subtle flex-shrink-0 hstack justify-content-center">
                              <h6 class="mb-0 fw-medium text-danger fs-4">S</h6>
                            </span>
                            <div>
                              <h6 class="mb-0 fw-medium fs-4">Sunil Joshi</h6>
                              <p class="mb-0 fs-3 text-body">Web Designer</p>
                            </div>
                          </div>
                        </td>
                        <td>
                          <p class="mb-0 fs-3 text-body">Elite Admin</p>
                        </td>
                        <td>
                          <span class="badge bg-danger-subtle text-danger rounded-pill">Low</span>
                        </td>
                        <td>
                          <p class="mb-0 fs-3 text-body">$2.4K</p>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="hstack gap-3">
                            <span class="round-48 rounded-circle overflow-hidden bg-warning-subtle flex-shrink-0 hstack justify-content-center">
                              <h6 class="mb-0 fw-medium text-warning fs-4">A</h6>
                            </span>
                            <div>
                              <h6 class="mb-0 fw-medium fs-4">Andrew</h6>
                              <p class="mb-0 fs-3 text-body">Project Manager</p>
                            </div>
                          </div>
                        </td>
                        <td>
                          <p class="mb-0 fs-3 text-body">Real Homes</p>
                        </td>
                        <td>
                          <span class="badge bg-warning-subtle text-warning rounded-pill">Medium</span>
                        </td>
                        <td>
                          <p class="mb-0 fs-3 text-body">$23.5K</p>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="hstack gap-3">
                            <span class="round-48 rounded-circle overflow-hidden bg-info-subtle flex-shrink-0 hstack justify-content-center">
                              <h6 class="mb-0 fw-medium text-info fs-4">N</h6>
                            </span>
                            <div>
                              <h6 class="mb-0 fw-medium fs-4">Nirav Joshi</h6>
                              <p class="mb-0 fs-3 text-body">Frontend Eng</p>
                            </div>
                          </div>
                        </td>
                        <td>
                          <p class="mb-0 fs-3 text-body">MedicalPro Theme</p>
                        </td>
                        <td>
                          <span class="badge bg-success-subtle text-success rounded-pill">High</span>
                        </td>
                        <td>
                          <p class="mb-0 fs-3 text-body">$10.3K</p>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="hstack gap-3">
                            <span class="round-48 rounded-circle overflow-hidden bg-danger-subtle flex-shrink-0 hstack justify-content-center">
                              <img src="assets/panel/images/profile/user-7.jpg" alt="" class="img-fluid">
                            </span>
                            <div>
                              <h6 class="mb-0 fw-medium fs-4">Johnathan</h6>
                              <p class="mb-0 fs-3 text-body">Content Writter</p>
                            </div>
                          </div>
                        </td>
                        <td>
                          <p class="mb-0 fs-3 text-body">Helping Hands</p>
                        </td>
                        <td>
                          <span class="badge bg-danger-subtle text-danger rounded-pill">Low</span>
                        </td>
                        <td>
                          <p class="mb-0 fs-3 text-body">$2.6K</p>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="hstack gap-3">
                            <span class="round-48 rounded-circle overflow-hidden bg-secondary-subtle flex-shrink-0 hstack justify-content-center">
                              <h6 class="mb-0 fw-medium text-secondary fs-4">M</h6>
                            </span>
                            <div>
                              <h6 class="mb-0 fw-medium fs-4">Michael Doe</h6>
                              <p class="mb-0 fs-3 text-body">Graphic Designer</p>
                            </div>
                          </div>
                        </td>
                        <td>
                          <p class="mb-0 fs-3 text-body">Digital Agency</p>
                        </td>
                        <td>
                          <span class="badge bg-secondary-subtle text-secondary rounded-pill">Very
                            High</span>
                        </td>
                        <td>
                          <p class="mb-0 fs-3 text-body">$12.4K</p>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="card widget-weather-report w-100">
                <div class="card-body">
                  <div class="d-md-flex align-items-center no-block mb-4">
                    <h4 class="card-title mb-0 text-white">Weather Report</h4>
                    <div class="ms-auto">
                      <div class="dropdown">
                        <button class="btn border-white border-opacity-10 text-white shadow-none dropdown-toggle fs-3 py-2 px-3" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Today
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end fs-3">
                          <li>
                            <a class="dropdown-item" href="javascript:void(0)">Today</a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="javascript:void(0)">Weekly</a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="hstack justify-content-between align-items-end pb-4 border-white border-bottom border-opacity-10">
                    <div>
                      <i class="ti ti-cloud-rain fs-10 mb-2 text-white d-block"></i>
                      <h2 class="mb-0 text-white fs-10 fw-light">18° C</h2>
                    </div>
                    <h4 class="mb-0 fs-6 text-white fw-normal text-end">Dramatic</br> Cloudy</h4>
                  </div>
                  <div class="my-3">
                    <h5 class="mb-3 text-white fw-medium">Chance of rain</h5>
                    <div class="hstack gap-6 mb-3">
                      <h6 class="mb-0 text-white flex-shrink-0 fw-normal">7 PM</h6>
                      <div class="progress bg-white bg-opacity-05 w-100 rounded-3" style="height: 16px;">
                        <div class="progress-bar bg-info rounded-3" role="progressbar" style="width: 44%" aria-valuenow="44" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <h6 class="mb-0 text-white flex-shrink-0 fw-normal">44%</h6>
                    </div>
                    <div class="hstack gap-6 mb-3">
                      <h6 class="mb-0 text-white flex-shrink-0 fw-normal">8 PM</h6>
                      <div class="progress bg-white bg-opacity-05 w-100 rounded-3" style="height: 16px;">
                        <div class="progress-bar bg-info rounded-3" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <h6 class="mb-0 text-white flex-shrink-0 fw-normal">30%</h6>
                    </div>
                    <div class="hstack gap-6">
                      <h6 class="mb-0 text-white flex-shrink-0 fw-normal">9 PM</h6>
                      <div class="progress bg-white bg-opacity-05 w-100 rounded-3" style="height: 16px;">
                        <div class="progress-bar bg-info rounded-3" role="progressbar" style="width: 67%" aria-valuenow="67" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <h6 class="mb-0 text-white flex-shrink-0 fw-normal">67%</h6>
                    </div>
                  </div>
                  <div class="sunrise-bg rounded-1 p-3 hstack justify-content-between gap-9 mt-4">
                    <i class="ti ti-sun-high text-white fs-10"></i>
                    <div>
                      <h5 class="text-white mb-8 fw-normal">Sunrise</h5>
                      <h2 class="mb-0 text-white fw-medium">4:20 AM</h2>
                    </div>
                    <h6 class="mb-0 text-white fw-normal">4 hours ago</h6>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>

@endsection

@section('script')
    <script src="<?= asset('assets/panel/libs/apexcharts/dist/apexcharts.min.js') ?>"></script>
    <script src="<?= asset('assets/panel/js/dashboards/dashboard3.js') ?>"></script>

@endsection