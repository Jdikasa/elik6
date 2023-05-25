<form method="POST" id="save-task-data-form" autocomplete="off">
    <input type="search" class="autocomplete-password" style="opacity: 0;position: absolute;" autocomplete="off">
    <input type="password" class="autocomplete-password" style="opacity: 0;position: absolute;" autocomplete="off">
    <input type="email" name="f_email" class="autocomplete-password" readonly=""
        style="opacity: 0;position: absolute;" autocomplete="off">
    <input type="text" name="f_slack_username" class="autocomplete-password" readonly=""
        style="opacity: 0;position: absolute;" autocomplete="off">



    <input type="hidden" id="redirect_url" name="redirect_url" value="" autocomplete="off">

    <input type="hidden" name="_token" value="XVbLTCCyKuZDSazA9v6W9IN82XaBsn5x5vNyicm8" autocomplete="off">

    <div class="add-client bg-white rounded">
        <h4 class="mb-0 p-20 f-21 font-weight-normal text-capitalize border-bottom-grey">
            Task Info</h4>
        <div class="row p-20">

            <div class="col-lg-6 col-md-6">
                <div class="form-group my-3">
                    <label class="f-14 text-dark-grey mb-12" data-label="true" for="heading">Title
                        <sup class="f-14 mr-1">*</sup>

                    </label>

                    <input type="text" class="form-control height-35 f-14" placeholder="Enter a task title"
                        value="" name="heading" id="heading" autocomplete="off">

                </div>
            </div>

            <div class="col-md-6 col-lg-6">
                <label class="f-14 text-dark-grey mb-12 my-3" data-label="" for="category_id">Task category

                </label>
                <div class="input-group">

                    <div class="dropdown bootstrap-select form-control select-picker"><select
                            class="form-control select-picker" name="category_id" id="task_category_id"
                            data-live-search="true" data-size="8" tabindex="null">
                            <option value="">--</option>
                        </select><button type="button" tabindex="-1"
                            class="btn dropdown-toggle btn-light bs-placeholder" data-toggle="dropdown" role="combobox"
                            aria-owns="bs-select-15" aria-haspopup="listbox" aria-expanded="false"
                            data-id="task_category_id" title="--">
                            <div class="filter-option">
                                <div class="filter-option-inner">
                                    <div class="filter-option-inner-inner">--</div>
                                </div>
                            </div>
                        </button>
                        <div class="dropdown-menu"
                            style="overflow: hidden; position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 39px, 0px);"
                            x-placement="bottom-start">
                            <div class="bs-searchbox"><input type="search" class="form-control" autocomplete="off"
                                    role="combobox" aria-label="Search" aria-controls="bs-select-15"
                                    aria-autocomplete="list" aria-activedescendant="bs-select-15-0"></div>
                            <div class="inner show" role="listbox" id="bs-select-15" tabindex="-1"
                                style="overflow-y: auto;">
                                <ul class="dropdown-menu inner show" role="presentation"
                                    style="margin-top: 0px; margin-bottom: 0px;">
                                    <li class="selected active"><a role="option" class="dropdown-item active selected"
                                            id="bs-select-15-0" tabindex="0" aria-setsize="1" aria-posinset="1"
                                            aria-selected="true"><span class=" bs-ok-default check-mark"></span><span
                                                class="text">--</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>


                    <div class="input-group-append">
                        <button id="create_task_category" type="button"
                            class="btn btn-outline-secondary border-grey" data-toggle="tooltip"
                            data-original-title="Add Task Category">Add</button>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-lg-6">


                <label class="f-14 text-dark-grey mb-12 mt-3" data-label="" for="project_id">Project

                </label>
                <div class="form-group mb-0">

                    <div class="dropdown bootstrap-select form-control select-picker">
                        <select name="project_id"
                            id="project_id" data-live-search="true" class="form-control select-picker"
                            data-size="8" tabindex="null">
                            <option value="">--</option>
                        </select><button type="button" tabindex="-1"
                            class="btn dropdown-toggle btn-light bs-placeholder" data-toggle="dropdown"
                            role="combobox" aria-owns="bs-select-16" aria-haspopup="listbox" aria-expanded="false"
                            data-id="project_id" title="--">
                            <div class="filter-option">
                                <div class="filter-option-inner">
                                    <div class="filter-option-inner-inner">--</div>
                                </div>
                            </div>
                        </button>
                        <div class="dropdown-menu"
                            style="overflow: hidden; position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 39px, 0px);"
                            x-placement="bottom-start">
                            <div class="bs-searchbox"><input type="search" class="form-control" autocomplete="off"
                                    role="combobox" aria-label="Search" aria-controls="bs-select-16"
                                    aria-autocomplete="list" aria-activedescendant="bs-select-16-0"></div>
                            <div class="inner show" role="listbox" id="bs-select-16" tabindex="-1"
                                style="overflow-y: auto;">
                                <ul class="dropdown-menu inner show" role="presentation"
                                    style="margin-top: 0px; margin-bottom: 0px;">
                                    <li class="selected active"><a role="option"
                                            class="dropdown-item active selected" id="bs-select-16-0" tabindex="0"
                                            aria-setsize="1" aria-posinset="1" aria-selected="true"><span
                                                class=" bs-ok-default check-mark"></span><span
                                                class="text">--</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-6 col-lg-6 pt-5" id="clientDetails"></div>


            <div class="col-md-5 col-lg-3">
                <div class="form-group my-3" style="position: relative;">
                    <label class="f-14 text-dark-grey mb-12" data-label="true" for="task_start_date">
                        Start Date
                        <sup class="f-14 mr-1">*</sup>

                    </label>

                    <input type="text" class="form-control  date-picker height-35 f-14" placeholder="Select Date"
                        value="06-05-2023" name="start_date" id="task_start_date" autocomplete="off">

                    <div class="qs-datepicker-container qs-hidden" style="top: 71.5px; left: 0px;">
                        <div class="qs-datepicker">
                            <div class="qs-controls">
                                <div class="qs-arrow qs-left"></div>
                                <div class="qs-month-year"><span class="qs-month">May</span><span
                                        class="qs-year">2023</span></div>
                                <div class="qs-arrow qs-right"></div>
                            </div>
                            <div class="qs-squares">
                                <div class="qs-square qs-day">Mon</div>
                                <div class="qs-square qs-day">Tue</div>
                                <div class="qs-square qs-day">Wed</div>
                                <div class="qs-square qs-day">Thu</div>
                                <div class="qs-square qs-day">Fri</div>
                                <div class="qs-square qs-day">Sat</div>
                                <div class="qs-square qs-day">Sun</div>
                                <div class="qs-square Mon qs-num" data-direction="0">1</div>
                                <div class="qs-square Tue qs-num" data-direction="0">2</div>
                                <div class="qs-square Wed qs-num" data-direction="0">3</div>
                                <div class="qs-square Thu qs-num" data-direction="0">4</div>
                                <div class="qs-square Fri qs-num" data-direction="0">5</div>
                                <div class="qs-square Sat qs-num qs-current" data-direction="0">6</div>
                                <div class="qs-square Sun qs-num" data-direction="0">7</div>
                                <div class="qs-square Mon qs-num" data-direction="0">8</div>
                                <div class="qs-square Tue qs-num" data-direction="0">9</div>
                                <div class="qs-square Wed qs-num" data-direction="0">10</div>
                                <div class="qs-square Thu qs-num" data-direction="0">11</div>
                                <div class="qs-square Fri qs-num" data-direction="0">12</div>
                                <div class="qs-square Sat qs-num" data-direction="0">13</div>
                                <div class="qs-square Sun qs-num" data-direction="0">14</div>
                                <div class="qs-square Mon qs-num" data-direction="0">15</div>
                                <div class="qs-square Tue qs-num" data-direction="0">16</div>
                                <div class="qs-square Wed qs-num" data-direction="0">17</div>
                                <div class="qs-square Thu qs-num" data-direction="0">18</div>
                                <div class="qs-square Fri qs-num" data-direction="0">19</div>
                                <div class="qs-square Sat qs-num" data-direction="0">20</div>
                                <div class="qs-square Sun qs-num" data-direction="0">21</div>
                                <div class="qs-square Mon qs-num" data-direction="0">22</div>
                                <div class="qs-square Tue qs-num" data-direction="0">23</div>
                                <div class="qs-square Wed qs-num" data-direction="0">24</div>
                                <div class="qs-square Thu qs-num" data-direction="0">25</div>
                                <div class="qs-square Fri qs-num" data-direction="0">26</div>
                                <div class="qs-square Sat qs-num" data-direction="0">27</div>
                                <div class="qs-square Sun qs-num" data-direction="0">28</div>
                                <div class="qs-square Mon qs-num" data-direction="0">29</div>
                                <div class="qs-square Tue qs-num" data-direction="0">30</div>
                                <div class="qs-square Wed qs-num" data-direction="0">31</div>
                                <div class="qs-square Thu qs-outside-current-month qs-num" data-direction="1">1</div>
                                <div class="qs-square Fri qs-outside-current-month qs-num" data-direction="1">2</div>
                                <div class="qs-square Sat qs-outside-current-month qs-num" data-direction="1">3</div>
                                <div class="qs-square Sun qs-outside-current-month qs-num" data-direction="1">4</div>
                            </div>
                            <div class="qs-overlay qs-hidden">
                                <div><input class="qs-overlay-year" placeholder="4-digit year" autocomplete="off">
                                    <div class="qs-close">✕</div>
                                </div>
                                <div class="qs-overlay-month-container">
                                    <div class="qs-overlay-month" data-month-num="0">January</div>
                                    <div class="qs-overlay-month" data-month-num="1">February</div>
                                    <div class="qs-overlay-month" data-month-num="2">March</div>
                                    <div class="qs-overlay-month" data-month-num="3">April</div>
                                    <div class="qs-overlay-month" data-month-num="4">May</div>
                                    <div class="qs-overlay-month" data-month-num="5">June</div>
                                    <div class="qs-overlay-month" data-month-num="6">July</div>
                                    <div class="qs-overlay-month" data-month-num="7">August</div>
                                    <div class="qs-overlay-month" data-month-num="8">September</div>
                                    <div class="qs-overlay-month" data-month-num="9">October</div>
                                    <div class="qs-overlay-month" data-month-num="10">November</div>
                                    <div class="qs-overlay-month" data-month-num="11">December</div>
                                </div>
                                <div class="qs-submit qs-disabled">Submit</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-5 col-lg-3 dueDateBox" style="">
                <div class="form-group my-3" style="position: relative;">
                    <label class="f-14 text-dark-grey mb-12" data-label="true" for="due_date">Due Date
                        <sup class="f-14 mr-1">*</sup>

                    </label>

                    <input type="text" class="form-control  date-picker height-35 f-14" placeholder="Select Date"
                        value="06-05-2023" name="due_date" id="due_date" autocomplete="off">

                    <div class="qs-datepicker-container qs-hidden" style="top: 71.5px; left: 0px;">
                        <div class="qs-datepicker">
                            <div class="qs-controls">
                                <div class="qs-arrow qs-left"></div>
                                <div class="qs-month-year"><span class="qs-month">May</span><span
                                        class="qs-year">2023</span></div>
                                <div class="qs-arrow qs-right"></div>
                            </div>
                            <div class="qs-squares">
                                <div class="qs-square qs-day">Mon</div>
                                <div class="qs-square qs-day">Tue</div>
                                <div class="qs-square qs-day">Wed</div>
                                <div class="qs-square qs-day">Thu</div>
                                <div class="qs-square qs-day">Fri</div>
                                <div class="qs-square qs-day">Sat</div>
                                <div class="qs-square qs-day">Sun</div>
                                <div class="qs-square Mon qs-num" data-direction="0">1</div>
                                <div class="qs-square Tue qs-num" data-direction="0">2</div>
                                <div class="qs-square Wed qs-num" data-direction="0">3</div>
                                <div class="qs-square Thu qs-num" data-direction="0">4</div>
                                <div class="qs-square Fri qs-num" data-direction="0">5</div>
                                <div class="qs-square Sat qs-num qs-current" data-direction="0">6</div>
                                <div class="qs-square Sun qs-num" data-direction="0">7</div>
                                <div class="qs-square Mon qs-num" data-direction="0">8</div>
                                <div class="qs-square Tue qs-num" data-direction="0">9</div>
                                <div class="qs-square Wed qs-num" data-direction="0">10</div>
                                <div class="qs-square Thu qs-num" data-direction="0">11</div>
                                <div class="qs-square Fri qs-num" data-direction="0">12</div>
                                <div class="qs-square Sat qs-num" data-direction="0">13</div>
                                <div class="qs-square Sun qs-num" data-direction="0">14</div>
                                <div class="qs-square Mon qs-num" data-direction="0">15</div>
                                <div class="qs-square Tue qs-num" data-direction="0">16</div>
                                <div class="qs-square Wed qs-num" data-direction="0">17</div>
                                <div class="qs-square Thu qs-num" data-direction="0">18</div>
                                <div class="qs-square Fri qs-num" data-direction="0">19</div>
                                <div class="qs-square Sat qs-num" data-direction="0">20</div>
                                <div class="qs-square Sun qs-num" data-direction="0">21</div>
                                <div class="qs-square Mon qs-num" data-direction="0">22</div>
                                <div class="qs-square Tue qs-num" data-direction="0">23</div>
                                <div class="qs-square Wed qs-num" data-direction="0">24</div>
                                <div class="qs-square Thu qs-num" data-direction="0">25</div>
                                <div class="qs-square Fri qs-num" data-direction="0">26</div>
                                <div class="qs-square Sat qs-num" data-direction="0">27</div>
                                <div class="qs-square Sun qs-num" data-direction="0">28</div>
                                <div class="qs-square Mon qs-num" data-direction="0">29</div>
                                <div class="qs-square Tue qs-num" data-direction="0">30</div>
                                <div class="qs-square Wed qs-num" data-direction="0">31</div>
                                <div class="qs-square Thu qs-outside-current-month qs-num" data-direction="1">1</div>
                                <div class="qs-square Fri qs-outside-current-month qs-num" data-direction="1">2</div>
                                <div class="qs-square Sat qs-outside-current-month qs-num" data-direction="1">3</div>
                                <div class="qs-square Sun qs-outside-current-month qs-num" data-direction="1">4</div>
                            </div>
                            <div class="qs-overlay qs-hidden">
                                <div><input class="qs-overlay-year" placeholder="4-digit year" autocomplete="off">
                                    <div class="qs-close">✕</div>
                                </div>
                                <div class="qs-overlay-month-container">
                                    <div class="qs-overlay-month" data-month-num="0">January</div>
                                    <div class="qs-overlay-month" data-month-num="1">February</div>
                                    <div class="qs-overlay-month" data-month-num="2">March</div>
                                    <div class="qs-overlay-month" data-month-num="3">April</div>
                                    <div class="qs-overlay-month" data-month-num="4">May</div>
                                    <div class="qs-overlay-month" data-month-num="5">June</div>
                                    <div class="qs-overlay-month" data-month-num="6">July</div>
                                    <div class="qs-overlay-month" data-month-num="7">August</div>
                                    <div class="qs-overlay-month" data-month-num="8">September</div>
                                    <div class="qs-overlay-month" data-month-num="9">October</div>
                                    <div class="qs-overlay-month" data-month-num="10">November</div>
                                    <div class="qs-overlay-month" data-month-num="11">December</div>
                                </div>
                                <div class="qs-submit qs-disabled">Submit</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-lg-2 pt-5">
                <div class="form-check">
                    <input class="form-check-input mr-0 mr-lg-2 mr-md-2" type="checkbox" value="yes"
                        name="without_duedate" id="without_duedate" autocomplete="off">
                    <label
                        class="form-check-label form_custom_label text-dark-grey pl-2 mr-3 justify-content-start cursor-pointer checkmark-20 pt-1 text-wrap"
                        for="without_duedate">
                        Without Due Date
                    </label>
                </div>
            </div>

            <div class="col-md-12 col-lg-12">
            </div>

            <div class="col-md-12 col-lg-8">
                <div class="form-group my-3">
                    <label class="f-14 text-dark-grey mb-12" data-label="" for="selectAssignee">Assigned To

                    </label>
                    <div class="input-group">

                        <div class="dropdown bootstrap-select show-tick form-control multiple-users dropup"><select
                                class="form-control multiple-users" multiple="" name="user_id[]"
                                id="selectAssignee" data-live-search="true" data-size="8" tabindex="null">
                                <option 1=""
                                    data-content="<span class='badge badge-pill badge-light border'><div class='d-inline-block mr-1'>
<img class='taskEmployeeImg rounded-circle' src='https://www.gravatar.com/avatar/d41d8cd98f00b204e9800998ecf8427e.png?s=200&amp;d=mp' >
           </div>Jdikasa <span class=&quot;ml-2 badge badge-secondary pr-1&quot;>It's you</span></span>"
                                    value="47">
                                    Jdikasa
                                </option>

                            </select><button type="button" tabindex="-1" class="btn dropdown-toggle btn-light"
                                data-toggle="dropdown" role="combobox" aria-owns="bs-select-14"
                                aria-haspopup="listbox" aria-expanded="false" data-id="selectAssignee"
                                title="Jdikasa It's you">
                                <div class="filter-option">
                                    <div class="filter-option-inner">
                                        <div class="filter-option-inner-inner"><span
                                                class="badge badge-pill badge-light border">
                                                <div class="d-inline-block mr-1">
                                                    <img class="taskEmployeeImg rounded-circle"
                                                        src="https://www.gravatar.com/avatar/d41d8cd98f00b204e9800998ecf8427e.png?s=200&amp;d=mp">
                                                </div>Jdikasa <span class="ml-2 badge badge-secondary pr-1">It's
                                                    you</span>
                                            </span></div>
                                    </div>
                                </div>
                            </button>
                            <div class="dropdown-menu"
                                style="overflow: hidden; position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, -2px, 0px);"
                                x-placement="top-start">
                                <div class="bs-searchbox"><input type="search" class="form-control"
                                        autocomplete="off" role="combobox" aria-label="Search"
                                        aria-controls="bs-select-14" aria-autocomplete="list"></div>
                                <div class="bs-actionsbox">
                                    <div class="btn-group btn-group-sm btn-block"><button type="button"
                                            class="actions-btn bs-select-all btn btn-light">Select All</button><button
                                            type="button" class="actions-btn bs-deselect-all btn btn-light">Deselect
                                            All</button></div>
                                </div>
                                <div class="inner show" role="listbox" id="bs-select-14" tabindex="-1"
                                    aria-multiselectable="true" style="overflow-y: auto;">
                                    <ul class="dropdown-menu inner show" role="presentation"
                                        style="margin-top: 0px; margin-bottom: 0px;">
                                        <li class="selected"><a role="option" class="dropdown-item selected"
                                                id="bs-select-14-0" tabindex="0" aria-selected="true"
                                                aria-setsize="1" aria-posinset="1"><span
                                                    class=" bs-ok-default check-mark"></span><span
                                                    class="text"><span class="badge badge-pill badge-light border">
                                                        <div class="d-inline-block mr-1">
                                                            <img class="taskEmployeeImg rounded-circle"
                                                                src="https://www.gravatar.com/avatar/d41d8cd98f00b204e9800998ecf8427e.png?s=200&amp;d=mp">
                                                        </div>Jdikasa <span
                                                            class="ml-2 badge badge-secondary pr-1">It's you</span>
                                                    </span></span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="input-group-append">
                            <button id="assign-self" type="button" class="btn btn-outline-secondary border-grey"
                                data-toggle="tooltip" data-original-title="Assign to me">
                                <img src="https://www.gravatar.com/avatar/ff5c12756fab86cc367a06601d62d058.png?s=200&amp;d=mp"
                                    class="img-fluid rounded-circle" width="23">
                            </button>
                        </div>

                        <div class="input-group-append">
                            <button id="add-employee" type="button" class="btn btn-outline-secondary border-grey"
                                data-toggle="tooltip" data-original-title="Add New Employee">Add</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group my-3">
                    <label class="f-14 text-dark-grey mb-12" data-label="" for="description">Description

                    </label>
                    <div class="ql-toolbar ql-snow"><span class="ql-formats"><span class="ql-header ql-picker"><span
                                    class="ql-picker-label" tabindex="0" role="button" aria-expanded="false"
                                    aria-controls="ql-picker-options-0"><svg viewBox="0 0 18 18">
                                        <polygon class="ql-stroke" points="7 11 9 13 11 11 7 11"></polygon>
                                        <polygon class="ql-stroke" points="7 7 9 5 11 7 7 7"></polygon>
                                    </svg></span><span class="ql-picker-options" aria-hidden="true" tabindex="-1"
                                    id="ql-picker-options-0"><span tabindex="0" role="button"
                                        class="ql-picker-item" data-value="1"></span><span tabindex="0"
                                        role="button" class="ql-picker-item" data-value="2"></span><span
                                        tabindex="0" role="button" class="ql-picker-item"
                                        data-value="3"></span><span tabindex="0" role="button"
                                        class="ql-picker-item" data-value="4"></span><span tabindex="0"
                                        role="button" class="ql-picker-item" data-value="5"></span><span
                                        tabindex="0" role="button"
                                        class="ql-picker-item"></span></span></span><select class="ql-header"
                                style="display: none;">
                                <option value="1"></option>
                                <option value="2"></option>
                                <option value="3"></option>
                                <option value="4"></option>
                                <option value="5"></option>
                                <option selected="selected"></option>
                            </select></span><span class="ql-formats"><button type="button" class="ql-list"
                                value="ordered"><svg viewBox="0 0 18 18">
                                    <line class="ql-stroke" x1="7" x2="15" y1="4"
                                        y2="4"></line>
                                    <line class="ql-stroke" x1="7" x2="15" y1="9"
                                        y2="9"></line>
                                    <line class="ql-stroke" x1="7" x2="15" y1="14"
                                        y2="14"></line>
                                    <line class="ql-stroke ql-thin" x1="2.5" x2="4.5" y1="5.5"
                                        y2="5.5"></line>
                                    <path class="ql-fill"
                                        d="M3.5,6A0.5,0.5,0,0,1,3,5.5V3.085l-0.276.138A0.5,0.5,0,0,1,2.053,3c-0.124-.247-0.023-0.324.224-0.447l1-.5A0.5,0.5,0,0,1,4,2.5v3A0.5,0.5,0,0,1,3.5,6Z">
                                    </path>
                                    <path class="ql-stroke ql-thin"
                                        d="M4.5,10.5h-2c0-.234,1.85-1.076,1.85-2.234A0.959,0.959,0,0,0,2.5,8.156">
                                    </path>
                                    <path class="ql-stroke ql-thin"
                                        d="M2.5,14.846a0.959,0.959,0,0,0,1.85-.109A0.7,0.7,0,0,0,3.75,14a0.688,0.688,0,0,0,.6-0.736,0.959,0.959,0,0,0-1.85-.109">
                                    </path>
                                </svg></button><button type="button" class="ql-list" value="bullet"><svg
                                    viewBox="0 0 18 18">
                                    <line class="ql-stroke" x1="6" x2="15" y1="4"
                                        y2="4"></line>
                                    <line class="ql-stroke" x1="6" x2="15" y1="9"
                                        y2="9"></line>
                                    <line class="ql-stroke" x1="6" x2="15" y1="14"
                                        y2="14"></line>
                                    <line class="ql-stroke" x1="3" x2="3" y1="4"
                                        y2="4"></line>
                                    <line class="ql-stroke" x1="3" x2="3" y1="9"
                                        y2="9"></line>
                                    <line class="ql-stroke" x1="3" x2="3" y1="14"
                                        y2="14"></line>
                                </svg></button></span><span class="ql-formats"><button type="button"
                                class="ql-bold"><svg viewBox="0 0 18 18">
                                    <path class="ql-stroke"
                                        d="M5,4H9.5A2.5,2.5,0,0,1,12,6.5v0A2.5,2.5,0,0,1,9.5,9H5A0,0,0,0,1,5,9V4A0,0,0,0,1,5,4Z">
                                    </path>
                                    <path class="ql-stroke"
                                        d="M5,9h5.5A2.5,2.5,0,0,1,13,11.5v0A2.5,2.5,0,0,1,10.5,14H5a0,0,0,0,1,0,0V9A0,0,0,0,1,5,9Z">
                                    </path>
                                </svg></button><button type="button" class="ql-italic"><svg viewBox="0 0 18 18">
                                    <line class="ql-stroke" x1="7" x2="13" y1="4"
                                        y2="4"></line>
                                    <line class="ql-stroke" x1="5" x2="11" y1="14"
                                        y2="14"></line>
                                    <line class="ql-stroke" x1="8" x2="10" y1="14"
                                        y2="4"></line>
                                </svg></button><button type="button" class="ql-underline"><svg viewBox="0 0 18 18">
                                    <path class="ql-stroke"
                                        d="M5,3V9a4.012,4.012,0,0,0,4,4H9a4.012,4.012,0,0,0,4-4V3"></path>
                                    <rect class="ql-fill" height="1" rx="0.5" ry="0.5"
                                        width="12" x="3" y="15"></rect>
                                </svg></button><button type="button" class="ql-strike"><svg viewBox="0 0 18 18">
                                    <line class="ql-stroke ql-thin" x1="15.5" x2="2.5" y1="8.5"
                                        y2="9.5"></line>
                                    <path class="ql-fill"
                                        d="M9.007,8C6.542,7.791,6,7.519,6,6.5,6,5.792,7.283,5,9,5c1.571,0,2.765.679,2.969,1.309a1,1,0,0,0,1.9-.617C13.356,4.106,11.354,3,9,3,6.2,3,4,4.538,4,6.5a3.2,3.2,0,0,0,.5,1.843Z">
                                    </path>
                                    <path class="ql-fill"
                                        d="M8.984,10C11.457,10.208,12,10.479,12,11.5c0,0.708-1.283,1.5-3,1.5-1.571,0-2.765-.679-2.969-1.309a1,1,0,1,0-1.9.617C4.644,13.894,6.646,15,9,15c2.8,0,5-1.538,5-3.5a3.2,3.2,0,0,0-.5-1.843Z">
                                    </path>
                                </svg></button></span><span class="ql-formats"><button type="button"
                                class="ql-image"><svg viewBox="0 0 18 18">
                                    <rect class="ql-stroke" height="10" width="12" x="3"
                                        y="4"></rect>
                                    <circle class="ql-fill" cx="6" cy="7" r="1"></circle>
                                    <polyline class="ql-even ql-fill"
                                        points="5 12 5 11 7 9 8 10 11 7 13 9 13 12 5 12"></polyline>
                                </svg></button><button type="button" class="ql-code-block"><svg viewBox="0 0 18 18">
                                    <polyline class="ql-even ql-stroke" points="5 7 3 9 5 11"></polyline>
                                    <polyline class="ql-even ql-stroke" points="13 7 15 9 13 11"></polyline>
                                    <line class="ql-stroke" x1="10" x2="8" y1="5"
                                        y2="13"></line>
                                </svg></button><button type="button" class="ql-link"><svg viewBox="0 0 18 18">
                                    <line class="ql-stroke" x1="7" x2="11" y1="7"
                                        y2="11"></line>
                                    <path class="ql-even ql-stroke"
                                        d="M8.9,4.577a3.476,3.476,0,0,1,.36,4.679A3.476,3.476,0,0,1,4.577,8.9C3.185,7.5,2.035,6.4,4.217,4.217S7.5,3.185,8.9,4.577Z">
                                    </path>
                                    <path class="ql-even ql-stroke"
                                        d="M13.423,9.1a3.476,3.476,0,0,0-4.679-.36,3.476,3.476,0,0,0,.36,4.679c1.392,1.392,2.5,2.542,4.679.36S14.815,10.5,13.423,9.1Z">
                                    </path>
                                </svg></button></span><span class="ql-formats"><button type="button"
                                class="ql-direction" value="rtl"><svg viewBox="0 0 18 18">
                                    <polygon class="ql-stroke ql-fill" points="3 11 5 9 3 7 3 11"></polygon>
                                    <line class="ql-stroke ql-fill" x1="15" x2="11" y1="4"
                                        y2="4"></line>
                                    <path class="ql-fill" d="M11,3a3,3,0,0,0,0,6h1V3H11Z"></path>
                                    <rect class="ql-fill" height="11" width="1" x="11"
                                        y="4"></rect>
                                    <rect class="ql-fill" height="11" width="1" x="13"
                                        y="4"></rect>
                                </svg><svg viewBox="0 0 18 18">
                                    <polygon class="ql-stroke ql-fill" points="15 12 13 10 15 8 15 12"></polygon>
                                    <line class="ql-stroke ql-fill" x1="9" x2="5" y1="4"
                                        y2="4"></line>
                                    <path class="ql-fill" d="M5,3A3,3,0,0,0,5,9H6V3H5Z"></path>
                                    <rect class="ql-fill" height="11" width="1" x="5"
                                        y="4"></rect>
                                    <rect class="ql-fill" height="11" width="1" x="7"
                                        y="4"></rect>
                                </svg></button></span><span class="ql-formats"><button type="button"
                                class="ql-clean"><svg class="" viewBox="0 0 18 18">
                                    <line class="ql-stroke" x1="5" x2="13" y1="3"
                                        y2="3"></line>
                                    <line class="ql-stroke" x1="6" x2="9.35" y1="12"
                                        y2="3"></line>
                                    <line class="ql-stroke" x1="11" x2="15" y1="11"
                                        y2="15"></line>
                                    <line class="ql-stroke" x1="15" x2="11" y1="11"
                                        y2="15"></line>
                                    <rect class="ql-fill" height="1" rx="0.5" ry="0.5"
                                        width="7" x="2" y="14"></rect>
                                </svg></button></span></div>
                    <div id="description" class="ql-container ql-snow">
                        <div class="ql-editor" data-gramm="false" contenteditable="true">
                            <p>texte da la tache</p>
                        </div>
                        <div class="ql-clipboard" tabindex="-1" contenteditable="true"></div>
                        <div class="ql-tooltip ql-hidden"><a class="ql-preview" rel="noopener noreferrer"
                                target="_blank" href="about:blank"></a><input type="text" data-formula="e=mc^2"
                                data-link="https://quilljs.com" data-video="Embed URL" autocomplete="off"><a
                                class="ql-action"></a><a class="ql-remove"></a></div>
                        <div class="textarea-emoji-control" style="position: absolute;"><svg viewBox="0 0 18 18">
                                <circle class="ql-fill" cx="7" cy="7" r="1"></circle>
                                <circle class="ql-fill" cx="11" cy="7" r="1"></circle>
                                <path class="ql-stroke" d="M7,10a2,2,0,0,0,4,0H7Z"></path>
                                <circle class="ql-stroke" cx="9" cy="9" r="6"></circle>
                            </svg></div>
                        <ul class="emoji_completions" style="position: absolute; display: none;"></ul>
                    </div>
                    <textarea name="description" id="description-text" class="d-none"></textarea>
                </div>
            </div>

        </div>

        <h4 class="mb-0 p-20 f-21 font-weight-normal text-capitalize border-top-grey other-details-button">
            <a href="javascript:;" class="text-dark toggle-other-details"><svg
                    class="svg-inline--fa fa-chevron-up fa-w-14" aria-hidden="true" focusable="false"
                    data-prefix="fa" data-icon="chevron-up" role="img" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 448 512" data-fa-i2svg="">
                    <path fill="currentColor"
                        d="M240.971 130.524l194.343 194.343c9.373 9.373 9.373 24.569 0 33.941l-22.667 22.667c-9.357 9.357-24.522 9.375-33.901.04L224 227.495 69.255 381.516c-9.379 9.335-24.544 9.317-33.901-.04l-22.667-22.667c-9.373-9.373-9.373-24.569 0-33.941L207.03 130.525c9.372-9.373 24.568-9.373 33.941-.001z">
                    </path>
                </svg><!-- <i class="fa fa-chevron-down"></i> Font Awesome fontawesome.com -->
                Other Details</a>
        </h4>

        <div class="row p-20" id="other-details">

            <div class="col-sm-12">
                <div class="row">

                    <div class="col-md-12 col-lg-4">
                        <div class="form-group my-3">
                            <label class="f-14 text-dark-grey mb-12" data-label="" for="task_labels">Label

                            </label>
                            <div class="input-group">

                                <div class="dropdown bootstrap-select show-tick select-picker form-control"><select
                                        class="select-picker form-control" multiple="" name="task_labels[]"
                                        id="task_labels" data-live-search="true" data-size="8">
                                    </select><button type="button" tabindex="-1"
                                        class="btn dropdown-toggle btn-light bs-placeholder" data-toggle="dropdown"
                                        role="combobox" aria-owns="bs-select-17" aria-haspopup="listbox"
                                        aria-expanded="false" data-id="task_labels" title="Nothing selected">
                                        <div class="filter-option">
                                            <div class="filter-option-inner">
                                                <div class="filter-option-inner-inner">Nothing selected</div>
                                            </div>
                                        </div>
                                    </button>
                                    <div class="dropdown-menu ">
                                        <div class="bs-searchbox"><input type="search" class="form-control"
                                                autocomplete="off" role="combobox" aria-label="Search"
                                                aria-controls="bs-select-17" aria-autocomplete="list"></div>
                                        <div class="inner show" role="listbox" id="bs-select-17" tabindex="-1"
                                            aria-multiselectable="true">
                                            <ul class="dropdown-menu inner show" role="presentation"></ul>
                                        </div>
                                    </div>
                                </div>


                                <div class="input-group-append">
                                    <button id="createTaskLabel" type="button"
                                        class="btn btn-outline-secondary border-grey" data-toggle="tooltip"
                                        data-original-title="Add Label">Add</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-4">
                        <label class="f-14 text-dark-grey mb-12 mt-3" data-label="" for="milestone-id">Milestones

                        </label>
                        <div class="form-group mb-0">

                            <div class="dropdown bootstrap-select form-control select-picker"><select
                                    name="milestone_id" id="milestone-id" class="form-control select-picker"
                                    data-size="8">
                                    <option value="">--</option>
                                </select><button type="button" tabindex="-1"
                                    class="btn dropdown-toggle btn-light bs-placeholder" data-toggle="dropdown"
                                    role="combobox" aria-owns="bs-select-18" aria-haspopup="listbox"
                                    aria-expanded="false" data-id="milestone-id" title="--">
                                    <div class="filter-option">
                                        <div class="filter-option-inner">
                                            <div class="filter-option-inner-inner">--</div>
                                        </div>
                                    </div>
                                </button>
                                <div class="dropdown-menu ">
                                    <div class="inner show" role="listbox" id="bs-select-18" tabindex="-1">
                                        <ul class="dropdown-menu inner show" role="presentation"></ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <label class="f-14 text-dark-grey mb-12 mt-3" data-label="" for="board_column_id">Status

                        </label>
                        <div class="form-group mb-0">

                            <div class="dropdown bootstrap-select form-control select-picker"><select
                                    name="board_column_id" id="board_column_id" data-live-search="true"
                                    class="form-control select-picker" data-size="8">
                                    <option selected="" value="59"
                                        data-content="<i class='fa fa-circle mr-2 text-red'></i>Incomplete">
                                    </option>
                                    <option value="60"
                                        data-content="<i class='fa fa-circle mr-2 text-yellow'></i>To Do">
                                    </option>
                                    <option value="61"
                                        data-content="<i class='fa fa-circle mr-2 text-blue'></i>Doing">
                                    </option>
                                    <option value="62"
                                        data-content="<i class='fa fa-circle mr-2 text-dark-green'></i>Completed">
                                    </option>
                                </select><button type="button" tabindex="-1" class="btn dropdown-toggle btn-light"
                                    data-toggle="dropdown" role="combobox" aria-owns="bs-select-19"
                                    aria-haspopup="listbox" aria-expanded="false" data-id="board_column_id"
                                    title="Incomplete">
                                    <div class="filter-option">
                                        <div class="filter-option-inner">
                                            <div class="filter-option-inner-inner"><svg
                                                    class="svg-inline--fa fa-circle fa-w-16 mr-2 text-red"
                                                    aria-hidden="true" focusable="false" data-prefix="fa"
                                                    data-icon="circle" role="img"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                    data-fa-i2svg="">
                                                    <path fill="currentColor"
                                                        d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z">
                                                    </path>
                                                </svg>
                                                <!-- <i class="fa fa-circle mr-2 text-red"></i> Font Awesome fontawesome.com -->Incomplete
                                            </div>
                                        </div>
                                    </div>
                                </button>
                                <div class="dropdown-menu ">
                                    <div class="bs-searchbox"><input type="search" class="form-control"
                                            autocomplete="off" role="combobox" aria-label="Search"
                                            aria-controls="bs-select-19" aria-autocomplete="list"></div>
                                    <div class="inner show" role="listbox" id="bs-select-19" tabindex="-1">
                                        <ul class="dropdown-menu inner show" role="presentation"></ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <label class="f-14 text-dark-grey mb-12 mt-3" data-label="" for="priority">Priority

                        </label>
                        <div class="form-group mb-0">

                            <div class="dropdown bootstrap-select form-control select-picker"><select
                                    name="priority" id="priority" class="form-control select-picker"
                                    data-size="8" tabindex="null">
                                    <option
                                        data-content="<i class='fa fa-circle mr-2' style='color: #dd0000'></i> High"
                                        value="high">High</option>
                                    <option value="medium"
                                        data-content="<i class='fa fa-circle mr-2' style='color: #ffc202'></i> Medium"
                                        selected="">Medium</option>
                                    <option
                                        data-content="<i class='fa fa-circle mr-2' style='color: #0a8a1f'></i> Low"
                                        value="low">Low</option>
                                </select><button type="button" tabindex="-1"
                                    class="btn dropdown-toggle btn-light" data-toggle="dropdown" role="combobox"
                                    aria-owns="bs-select-20" aria-haspopup="listbox" aria-expanded="false"
                                    data-id="priority" title="High">
                                    <div class="filter-option">
                                        <div class="filter-option-inner">
                                            <div class="filter-option-inner-inner"><svg
                                                    class="svg-inline--fa fa-circle fa-w-16 mr-2"
                                                    style="color: #dd0000;" aria-hidden="true" focusable="false"
                                                    data-prefix="fa" data-icon="circle" role="img"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                    data-fa-i2svg="">
                                                    <path fill="currentColor"
                                                        d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z">
                                                    </path>
                                                </svg>
                                                <!-- <i class="fa fa-circle mr-2" style="color: #dd0000"></i> Font Awesome fontawesome.com -->
                                                High</div>
                                        </div>
                                    </div>
                                </button>
                                <div class="dropdown-menu"
                                    style="overflow: hidden; position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, -321px, 0px);"
                                    x-placement="top-start" x-out-of-boundaries="">
                                    <div class="inner show" role="listbox" id="bs-select-20" tabindex="-1"
                                        style="overflow-y: auto;" aria-activedescendant="bs-select-20-0">
                                        <ul class="dropdown-menu inner show" role="presentation"
                                            style="margin-top: 0px; margin-bottom: 0px;">
                                            <li class="selected active"><a role="option"
                                                    class="dropdown-item active selected" id="bs-select-20-0"
                                                    tabindex="0" aria-setsize="3" aria-posinset="1"
                                                    aria-selected="true"><span
                                                        class=" bs-ok-default check-mark"></span><span
                                                        class="text"><svg
                                                            class="svg-inline--fa fa-circle fa-w-16 mr-2"
                                                            style="color: #dd0000;" aria-hidden="true"
                                                            focusable="false" data-prefix="fa" data-icon="circle"
                                                            role="img" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 512 512" data-fa-i2svg="">
                                                            <path fill="currentColor"
                                                                d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z">
                                                            </path>
                                                        </svg>
                                                        <!-- <i class="fa fa-circle mr-2" style="color: #dd0000"></i> Font Awesome fontawesome.com -->
                                                        High</span></a></li>
                                            <li class=""><a role="option" class="dropdown-item"
                                                    id="bs-select-20-1" tabindex="0" aria-setsize="3"
                                                    aria-posinset="2"><span
                                                        class=" bs-ok-default check-mark"></span><span
                                                        class="text"><svg
                                                            class="svg-inline--fa fa-circle fa-w-16 mr-2"
                                                            style="color: #ffc202;" aria-hidden="true"
                                                            focusable="false" data-prefix="fa" data-icon="circle"
                                                            role="img" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 512 512" data-fa-i2svg="">
                                                            <path fill="currentColor"
                                                                d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z">
                                                            </path>
                                                        </svg>
                                                        <!-- <i class="fa fa-circle mr-2" style="color: #ffc202"></i> Font Awesome fontawesome.com -->
                                                        Medium</span></a></li>
                                            <li><a role="option" class="dropdown-item" id="bs-select-20-2"
                                                    tabindex="0"><span
                                                        class=" bs-ok-default check-mark"></span><span
                                                        class="text"><svg
                                                            class="svg-inline--fa fa-circle fa-w-16 mr-2"
                                                            style="color: #0a8a1f;" aria-hidden="true"
                                                            focusable="false" data-prefix="fa" data-icon="circle"
                                                            role="img" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 512 512" data-fa-i2svg="">
                                                            <path fill="currentColor"
                                                                d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z">
                                                            </path>
                                                        </svg>
                                                        <!-- <i class="fa fa-circle mr-2" style="color: #0a8a1f"></i> Font Awesome fontawesome.com -->
                                                        Low</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-6 col-lg-3">
                <div class="form-group">
                    <div class="d-flex mt-5">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="is_private" id="is_private"
                                autocomplete="off">
                            <label
                                class="form-check-label form_custom_label text-dark-grey pl-2 mr-3 justify-content-start cursor-pointer checkmark-20 pt-1 text-wrap"
                                for="is_private">
                                Make Private
                                &nbsp;<svg class="svg-inline--fa fa-question-circle fa-w-16" data-toggle="popover"
                                    data-placement="top" data-html="true"
                                    data-content="Private tasks are only visible to admin, assignor and assignee."
                                    data-trigger="hover" aria-hidden="true" focusable="false" data-prefix="fa"
                                    data-icon="question-circle" role="img" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512" data-fa-i2svg="" data-original-title=""
                                    title="">
                                    <path fill="currentColor"
                                        d="M504 256c0 136.997-111.043 248-248 248S8 392.997 8 256C8 119.083 119.043 8 256 8s248 111.083 248 248zM262.655 90c-54.497 0-89.255 22.957-116.549 63.758-3.536 5.286-2.353 12.415 2.715 16.258l34.699 26.31c5.205 3.947 12.621 3.008 16.665-2.122 17.864-22.658 30.113-35.797 57.303-35.797 20.429 0 45.698 13.148 45.698 32.958 0 14.976-12.363 22.667-32.534 33.976C247.128 238.528 216 254.941 216 296v4c0 6.627 5.373 12 12 12h56c6.627 0 12-5.373 12-12v-1.333c0-28.462 83.186-29.647 83.186-106.667 0-58.002-60.165-102-116.531-102zM256 338c-25.365 0-46 20.635-46 46 0 25.364 20.635 46 46 46s46-20.636 46-46c0-25.365-20.635-46-46-46z">
                                    </path>
                                </svg>
                                <!-- <i class="fa fa-question-circle" data-toggle="popover" data-placement="top" data-html="true" data-content="Private tasks are only visible to admin, assignor and assignee." data-trigger="hover"></i> Font Awesome fontawesome.com -->
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="form-group">
                    <div class="d-flex mt-5">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="billable" id="billable"
                                autocomplete="off">
                            <label
                                class="form-check-label form_custom_label text-dark-grey pl-2 mr-3 justify-content-start cursor-pointer checkmark-20 pt-1 text-wrap"
                                for="billable">
                                Billable
                                &nbsp;<svg class="svg-inline--fa fa-question-circle fa-w-16" data-toggle="popover"
                                    data-placement="top" data-html="true"
                                    data-content="Invoice can be generated for this task's time log."
                                    data-trigger="hover" aria-hidden="true" focusable="false" data-prefix="fa"
                                    data-icon="question-circle" role="img" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512" data-fa-i2svg="" data-original-title=""
                                    title="">
                                    <path fill="currentColor"
                                        d="M504 256c0 136.997-111.043 248-248 248S8 392.997 8 256C8 119.083 119.043 8 256 8s248 111.083 248 248zM262.655 90c-54.497 0-89.255 22.957-116.549 63.758-3.536 5.286-2.353 12.415 2.715 16.258l34.699 26.31c5.205 3.947 12.621 3.008 16.665-2.122 17.864-22.658 30.113-35.797 57.303-35.797 20.429 0 45.698 13.148 45.698 32.958 0 14.976-12.363 22.667-32.534 33.976C247.128 238.528 216 254.941 216 296v4c0 6.627 5.373 12 12 12h56c6.627 0 12-5.373 12-12v-1.333c0-28.462 83.186-29.647 83.186-106.667 0-58.002-60.165-102-116.531-102zM256 338c-25.365 0-46 20.635-46 46 0 25.364 20.635 46 46 46s46-20.636 46-46c0-25.365-20.635-46-46-46z">
                                    </path>
                                </svg>
                                <!-- <i class="fa fa-question-circle" data-toggle="popover" data-placement="top" data-html="true" data-content="Invoice can be generated for this task's time log." data-trigger="hover"></i> Font Awesome fontawesome.com -->
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="form-group">
                    <div class="d-flex mt-5">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="set_time_estimate"
                                id="set_time_estimate" autocomplete="off">
                            <label
                                class="form-check-label form_custom_label text-dark-grey pl-2 mr-3 justify-content-start cursor-pointer checkmark-20 pt-1 text-wrap"
                                for="set_time_estimate">
                                Time estimate
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3" id="set-time-estimate-fields">
                <div class="form-group mt-5">
                    <input type="number" min="0" class="w-25 border rounded p-2 height-35 f-14"
                        name="estimate_hours" value="0" autocomplete="off">
                    hrs &nbsp;&nbsp;
                    <input type="number" min="0" name="estimate_minutes" value="0"
                        class="w-25 height-35 f-14 border rounded p-2" autocomplete="off">
                    mins
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group my-3">
                    <div class="d-flex">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="repeat" id="repeat-task"
                                autocomplete="off">
                            <label
                                class="form-check-label form_custom_label text-dark-grey pl-2 mr-3 justify-content-start cursor-pointer checkmark-20 pt-1 text-wrap"
                                for="repeat-task">
                                Repeat
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group my-3" id="repeat-fields">
                    <div class="row">
                        <div class="col-md-6 mt-3">
                            <label class="f-14 text-dark-grey mb-12" data-label="true" for="repeatEvery">Repeat
                                every
                                <sup class="f-14 mr-1">*</sup>

                                <svg class="svg-inline--fa fa-question-circle fa-w-16" data-toggle="popover"
                                    data-placement="top" data-content="Task will auto-create after every X days."
                                    data-html="true" data-trigger="hover" aria-hidden="true" focusable="false"
                                    data-prefix="fa" data-icon="question-circle" role="img"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""
                                    data-original-title="" title="">
                                    <path fill="currentColor"
                                        d="M504 256c0 136.997-111.043 248-248 248S8 392.997 8 256C8 119.083 119.043 8 256 8s248 111.083 248 248zM262.655 90c-54.497 0-89.255 22.957-116.549 63.758-3.536 5.286-2.353 12.415 2.715 16.258l34.699 26.31c5.205 3.947 12.621 3.008 16.665-2.122 17.864-22.658 30.113-35.797 57.303-35.797 20.429 0 45.698 13.148 45.698 32.958 0 14.976-12.363 22.667-32.534 33.976C247.128 238.528 216 254.941 216 296v4c0 6.627 5.373 12 12 12h56c6.627 0 12-5.373 12-12v-1.333c0-28.462 83.186-29.647 83.186-106.667 0-58.002-60.165-102-116.531-102zM256 338c-25.365 0-46 20.635-46 46 0 25.364 20.635 46 46 46s46-20.636 46-46c0-25.365-20.635-46-46-46z">
                                    </path>
                                </svg>
                                <!-- <i class="fa fa-question-circle" data-toggle="popover" data-placement="top" data-content="Task will auto-create after every X days." data-html="true" data-trigger="hover"></i> Font Awesome fontawesome.com -->
                            </label>
                            <div class="input-group">

                                <input type="number" min="1" name="repeat_count"
                                    class="form-control f-14" value="1" autocomplete="off">


                                <div class="input-group-append">
                                    <div class="dropdown bootstrap-select select-picker form-control dropup"><select
                                            name="repeat_type" class="select-picker form-control" tabindex="null">
                                            <option value="day">Day(s)</option>
                                            <option value="week">Week(s)</option>
                                            <option value="month">Month</option>
                                            <option value="year">Year</option>
                                        </select><button type="button" tabindex="-1"
                                            class="btn dropdown-toggle btn-light" data-toggle="dropdown"
                                            role="combobox" aria-owns="bs-select-21" aria-haspopup="listbox"
                                            aria-expanded="false" title="Day(s)">
                                            <div class="filter-option">
                                                <div class="filter-option-inner">
                                                    <div class="filter-option-inner-inner">Day(s)</div>
                                                </div>
                                            </div>
                                        </button>
                                        <div class="dropdown-menu"
                                            style="max-height: 1202.23px; overflow: hidden; min-height: 128px; position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, -568px, 0px);"
                                            x-placement="top-start" x-out-of-boundaries="">
                                            <div class="inner show" role="listbox" id="bs-select-21"
                                                tabindex="-1"
                                                style="max-height: 1184.23px; overflow-y: auto; min-height: 110px;"
                                                aria-activedescendant="bs-select-21-0">
                                                <ul class="dropdown-menu inner show" role="presentation"
                                                    style="margin-top: 0px; margin-bottom: 0px;">
                                                    <li class="selected active"><a role="option"
                                                            class="dropdown-item active selected"
                                                            id="bs-select-21-0" tabindex="0" aria-setsize="4"
                                                            aria-posinset="1" aria-selected="true"><span
                                                                class=" bs-ok-default check-mark"></span><span
                                                                class="text">Day(s)</span></a></li>
                                                    <li class=""><a role="option" class="dropdown-item"
                                                            id="bs-select-21-1" tabindex="0" aria-setsize="4"
                                                            aria-posinset="2"><span
                                                                class=" bs-ok-default check-mark"></span><span
                                                                class="text">Week(s)</span></a></li>
                                                    <li class=""><a role="option" class="dropdown-item"
                                                            id="bs-select-21-2" tabindex="0" aria-setsize="4"
                                                            aria-posinset="3"><span
                                                                class=" bs-ok-default check-mark"></span><span
                                                                class="text">Month</span></a></li>
                                                    <li class="selected active"><a role="option"
                                                            class="dropdown-item active selected"
                                                            id="bs-select-21-3" tabindex="0" aria-setsize="4"
                                                            aria-posinset="4" aria-selected="true"><span
                                                                class=" bs-ok-default check-mark"></span><span
                                                                class="text">Year</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group my-3">
                                <label class="f-14 text-dark-grey mb-12" data-label="true"
                                    for="repeat_cycles">Cycles
                                    <sup class="f-14 mr-1">*</sup>

                                    <svg class="svg-inline--fa fa-question-circle fa-w-16" data-toggle="popover"
                                        data-placement="top" data-content="Number of times to repeat"
                                        data-html="true" data-trigger="hover" aria-hidden="true"
                                        focusable="false" data-prefix="fa" data-icon="question-circle"
                                        role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                        data-fa-i2svg="" data-original-title="" title="">
                                        <path fill="currentColor"
                                            d="M504 256c0 136.997-111.043 248-248 248S8 392.997 8 256C8 119.083 119.043 8 256 8s248 111.083 248 248zM262.655 90c-54.497 0-89.255 22.957-116.549 63.758-3.536 5.286-2.353 12.415 2.715 16.258l34.699 26.31c5.205 3.947 12.621 3.008 16.665-2.122 17.864-22.658 30.113-35.797 57.303-35.797 20.429 0 45.698 13.148 45.698 32.958 0 14.976-12.363 22.667-32.534 33.976C247.128 238.528 216 254.941 216 296v4c0 6.627 5.373 12 12 12h56c6.627 0 12-5.373 12-12v-1.333c0-28.462 83.186-29.647 83.186-106.667 0-58.002-60.165-102-116.531-102zM256 338c-25.365 0-46 20.635-46 46 0 25.364 20.635 46 46 46s46-20.636 46-46c0-25.365-20.635-46-46-46z">
                                        </path>
                                    </svg>
                                    <!-- <i class="fa fa-question-circle" data-toggle="popover" data-placement="top" data-content="Number of times to repeat" data-html="true" data-trigger="hover"></i> Font Awesome fontawesome.com -->
                                </label>

                                <input type="number" class="form-control height-35 f-14"
                                    placeholder="Number of times to repeat" value="1" name="repeat_cycles"
                                    id="repeat_cycles" min="1" autocomplete="off">

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group my-3">
                    <div class="d-flex">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="dependent" id="dependent-task"
                                autocomplete="off">
                            <label
                                class="form-check-label form_custom_label text-dark-grey pl-2 mr-3 justify-content-start cursor-pointer checkmark-20 pt-1 text-wrap"
                                for="dependent-task">
                                Task is dependent on another task
                            </label>
                        </div>
                    </div>
                </div>

                <div class="d-none" id="dependent-fields">
                    <label class="f-14 text-dark-grey mb-12 mt-3" data-label="" for="dependent_task_id">Dependent
                        Task

                    </label>
                    <div class="form-group mb-0">

                        <div class="dropdown bootstrap-select form-control select-picker"><select
                                name="dependent_task_id" id="dependent_task_id" data-live-search="true"
                                class="form-control select-picker" data-size="8">
                                <option value="">--</option>
                            </select><button type="button" tabindex="-1"
                                class="btn dropdown-toggle btn-light bs-placeholder" data-toggle="dropdown"
                                role="combobox" aria-owns="bs-select-22" aria-haspopup="listbox"
                                aria-expanded="false" data-id="dependent_task_id" title="--">
                                <div class="filter-option">
                                    <div class="filter-option-inner">
                                        <div class="filter-option-inner-inner">--</div>
                                    </div>
                                </div>
                            </button>
                            <div class="dropdown-menu ">
                                <div class="bs-searchbox"><input type="search" class="form-control"
                                        autocomplete="off" role="combobox" aria-label="Search"
                                        aria-controls="bs-select-22" aria-autocomplete="list"></div>
                                <div class="inner show" role="listbox" id="bs-select-22" tabindex="-1">
                                    <ul class="dropdown-menu inner show" role="presentation"></ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="form-group my-3 mr-0 mr-lg-2 mr-md-2">
                    <label class="f-14 text-dark-grey mb-12" data-label="" for="task-file-upload-dropzone">Add
                        Files

                    </label>

                    <div id="file-upload-box">
                        <div class="row" id="file-dropzone">
                            <div class="col-md-12">
                                <div class="dropzone rounded border dz-clickable dz-started"
                                    id="task-file-upload-dropzone">
                                    <input type="hidden" name="_token"
                                        value="XVbLTCCyKuZDSazA9v6W9IN82XaBsn5x5vNyicm8" autocomplete="off">
                                    <div class="dz-default dz-message"><button class="dz-button"
                                            type="button">Choose a file</button></div>
                                    <div class="dz-preview dz-image-preview">
                                        <div class="dz-image"><img data-dz-thumbnail=""
                                                alt="Capture d’écran 2023-02-10 à 19.52.47.png"
                                                src="data:image/png;base64,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">
                                        </div>
                                        <div class="dz-details">
                                            <div class="dz-size"><span data-dz-size=""><strong>45.7</strong>
                                                    KB</span></div>
                                            <div class="dz-filename"><span data-dz-name="">Capture d’écran
                                                    2023-02-10 à 19.52.47.png</span></div>
                                        </div>
                                        <div class="dz-progress"><span class="dz-upload"
                                                data-dz-uploadprogress=""></span></div>
                                        <div class="dz-error-message"><span data-dz-errormessage=""></span></div>
                                        <div class="dz-success-mark"> <svg width="54px" height="54px"
                                                viewBox="0 0 54 54" version="1.1"
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <title>Check</title>
                                                <g stroke="none" stroke-width="1" fill="none"
                                                    fill-rule="evenodd">
                                                    <path
                                                        d="M23.5,31.8431458 L17.5852419,25.9283877 C16.0248253,24.3679711 13.4910294,24.366835 11.9289322,25.9289322 C10.3700136,27.4878508 10.3665912,30.0234455 11.9283877,31.5852419 L20.4147581,40.0716123 C20.5133999,40.1702541 20.6159315,40.2626649 20.7218615,40.3488435 C22.2835669,41.8725651 24.794234,41.8626202 26.3461564,40.3106978 L43.3106978,23.3461564 C44.8771021,21.7797521 44.8758057,19.2483887 43.3137085,17.6862915 C41.7547899,16.1273729 39.2176035,16.1255422 37.6538436,17.6893022 L23.5,31.8431458 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z"
                                                        stroke-opacity="0.198794158" stroke="#747474"
                                                        fill-opacity="0.816519475" fill="#FFFFFF"></path>
                                                </g>
                                            </svg> </div>
                                        <div class="dz-error-mark"> <svg width="54px" height="54px"
                                                viewBox="0 0 54 54" version="1.1"
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <title>Error</title>
                                                <g stroke="none" stroke-width="1" fill="none"
                                                    fill-rule="evenodd">
                                                    <g stroke="#747474" stroke-opacity="0.198794158"
                                                        fill="#FFFFFF" fill-opacity="0.816519475">
                                                        <path
                                                            d="M32.6568542,29 L38.3106978,23.3461564 C39.8771021,21.7797521 39.8758057,19.2483887 38.3137085,17.6862915 C36.7547899,16.1273729 34.2176035,16.1255422 32.6538436,17.6893022 L27,23.3431458 L21.3461564,17.6893022 C19.7823965,16.1255422 17.2452101,16.1273729 15.6862915,17.6862915 C14.1241943,19.2483887 14.1228979,21.7797521 15.6893022,23.3461564 L21.3431458,29 L15.6893022,34.6538436 C14.1228979,36.2202479 14.1241943,38.7516113 15.6862915,40.3137085 C17.2452101,41.8726271 19.7823965,41.8744578 21.3461564,40.3106978 L27,34.6568542 L32.6538436,40.3106978 C34.2176035,41.8744578 36.7547899,41.8726271 38.3137085,40.3137085 C39.8758057,38.7516113 39.8771021,36.2202479 38.3106978,34.6538436 L32.6568542,29 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z">
                                                        </path>
                                                    </g>
                                                </g>
                                            </svg> </div><a class="dz-remove" href="javascript:undefined;"
                                            data-dz-remove="">Remove file</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <input type="hidden" name="image_url" id="image_url" autocomplete="off">
            </div>
            <input type="hidden" name="taskID" id="taskID" autocomplete="off">
            <input type="hidden" name="addedFiles" id="addedFiles" autocomplete="off">


        </div>


        <div class="w-100 border-top-grey d-block d-lg-flex d-md-flex justify-content-start px-4 py-3">
            <button type="button" class="btn-primary rounded f-14 p-2 mr-3" id="save-task-form">
                <svg class="svg-inline--fa fa-check fa-w-16 mr-1" aria-hidden="true" focusable="false"
                    data-prefix="fa" data-icon="check" role="img" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 512 512" data-fa-i2svg="">
                    <path fill="currentColor"
                        d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z">
                    </path>
                </svg><!-- <i class="fa fa-check mr-1"></i> Font Awesome fontawesome.com -->
                Save
            </button>

            <input type="search" class="autocomplete-password" style="opacity: 0;position: absolute;"
                autocomplete="off">
            <input type="password" class="autocomplete-password" style="opacity: 0;position: absolute;"
                autocomplete="off">
            <input type="email" name="f_email" class="autocomplete-password" readonly=""
                style="opacity: 0;position: absolute;" autocomplete="off">
            <input type="text" name="f_slack_username" class="autocomplete-password" readonly=""
                style="opacity: 0;position: absolute;" autocomplete="off">


            <button type="button" class="btn-secondary rounded f-14 p-2 mr-3 d-none d-md-block"
                id="save-more-task-form">
                <svg class="svg-inline--fa fa-check-double fa-w-16 mr-1" aria-hidden="true" focusable="false"
                    data-prefix="fa" data-icon="check-double" role="img" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 512 512" data-fa-i2svg="">
                    <path fill="currentColor"
                        d="M505 174.8l-39.6-39.6c-9.4-9.4-24.6-9.4-33.9 0L192 374.7 80.6 263.2c-9.4-9.4-24.6-9.4-33.9 0L7 302.9c-9.4 9.4-9.4 24.6 0 34L175 505c9.4 9.4 24.6 9.4 33.9 0l296-296.2c9.4-9.5 9.4-24.7.1-34zm-324.3 106c6.2 6.3 16.4 6.3 22.6 0l208-208.2c6.2-6.3 6.2-16.4 0-22.6L366.1 4.7c-6.2-6.3-16.4-6.3-22.6 0L192 156.2l-55.4-55.5c-6.2-6.3-16.4-6.3-22.6 0L68.7 146c-6.2 6.3-6.2 16.4 0 22.6l112 112.2z">
                    </path>
                </svg><!-- <i class="fa fa-check-double mr-1"></i> Font Awesome fontawesome.com -->
                Save &amp; Add More
            </button>
            <a href="https://newtech.zerp365.com/account/tasks" class="btn-cancel rounded f-14 p-2 border-0">
                Cancel
            </a>
        </div>
    </div>
</form>
