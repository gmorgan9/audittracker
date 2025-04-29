<div class="sidebar ps-2">
<h1>
        Logo Here
    </h1>
    <div class="pt-4"></div>
    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#add_engagement" style="background-color: rgb(55, 67, 118); color: white;">
        Add New Engagement
    </button>
    <div class="pt-4"></div>
    <ul class="list-unstyled ps-4">
        <li class="">
            <a href="<?php BASE_URL; ?>/" class="text-decoration-none text-black fw-bold"><i class="bi bi-columns-gap" style="-webkit-text-stroke: 1px;color: rgb(55, 67, 118);"></i>
            &nbsp;&nbsp;Dashboard</a>
        </li>
        <hr style="color: gray !important; width: 75% !important; text-align: center !important;">
        <li class="pb-3">
            <a href="<?php BASE_URL; ?>/engagements/" class="text-decoration-none text-black fw-bold"><i class="bi bi-folder" style="-webkit-text-stroke: 1px;color: rgb(55, 67, 118);"></i>&nbsp;&nbsp;Engagements</a>
        </li>
        <ul class="list-unstyled">
            <li class="ps-4 pb-3">
                <a href="<?php BASE_URL; ?>/engagements/draft/" class="text-decoration-none text-black"><i class="bi bi-vector-pen"></i>&nbsp;&nbsp;Draft</a>
            </li>
            <li class="ps-4 pb-3">
                <a href="<?php BASE_URL; ?>/engagements/active/" class="text-decoration-none text-black"><i class="bi bi-check-circle"></i>&nbsp;&nbsp;Active</a>
            </li>
            <li class="ps-4 pb-3">
                <a href="<?php BASE_URL; ?>/engagements/in-review/" class="text-decoration-none text-black"><i class="bi bi-eye"></i>&nbsp;&nbsp;In Review</a>
            </li>
            <li class="ps-4">
                <a href="<?php BASE_URL; ?>/engagements/completed/" class="text-decoration-none text-black"><i class="bi bi-archive"></i>&nbsp;&nbsp;Completed</a>
            </li>
        </ul>
        <hr style="color: gray !important; width: 75% !important; text-align: center !important;">
        <li class="pb-3">
            <a href="" class="text-decoration-none text-black fw-bold"><i class="bi bi-diagram-3" style="-webkit-text-stroke: 1px;color: rgb(55, 67, 118);"></i>&nbsp;&nbsp;Organization</a>
        </li>
        <ul class="list-unstyled">
            <li class="ps-4 pb-3">
                <a href="" class="text-decoration-none text-black"><i class="bi bi-person-gear"></i>&nbsp;&nbsp;Users</a>
            </li>
            <li class="ps-4">
                <a href="" class="text-decoration-none text-black"><i class="bi bi-gear"></i>&nbsp;&nbsp;Settings</a>
            </li>
        </ul>
    </ul>
</div>

<!-- Modal -->
    <div class="modal fade" id="add_engagement" data-bs-keyboard="false" tabindex="-1" aria-labelledby="add_engagement_label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="add_engagement_label">Add New Engagement</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="" method="POST">
              <div class="modal-body">
                <div class="mb-3">
                  <label for="name" class="form-label">Name</label>
                  <input type="text" class="form-control" id="name" name="name">
                </div>
                    <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="type" class="form-label">Type</label>
                    <input type="text" class="form-control" id="type" name="type">
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select" id="status" name="status" required>
                      <option value="Draft">Draft</option>
                      <option value="Active">Active</option>
                      <option value="In Review">In Review</option>
                      <option value="Completed">Compelted</option>
                    </select>
                  </div>
                </div>
                    <div class="row">
                  <div class="col-md-4 mb-3">
                    <label for="reporting_start" class="form-label">Reporting Start</label>
                    <input type="date" class="form-control" id="reporting_start" name="reporting_start">
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="reporting_end" class="form-label">Reporting End</label>
                    <input type="date" class="form-control" id="reporting_end" name="reporting_end">
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="reporting_as_of" class="form-label">Reporting As Of</label>
                    <input type="date" class="form-control" id="reporting_as_of" name="reporting_as_of">
                  </div>
                </div>
                    <div class="row">
                  <div class="col-md-4 mb-3">
                    <label for="irl_due_date" class="form-label">IRL Due Date</label>
                    <input type="date" class="form-control" id="irl_due_date" name="irl_due_date">
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="evidence_due_date" class="form-label">Evidence Due Date</label>
                    <input type="date" class="form-control" id="evidence_due_date" name="evidence_due_date">
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="fieldwork_week" class="form-label">Fieldwork Week</label>
                    <input type="date" class="form-control" id="fieldwork_week" name="fieldwork_week">
                  </div>
                </div>
                    <div class="row">
                  <div class="col-md-4 mb-3">
                    <label for="leadsheet_due" class="form-label">Leadsheet Due</label>
                    <input type="date" class="form-control" id="leadsheet_due" name="leadsheet_due">
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="draft_date" class="form-label">Draft Date</label>
                    <input type="date" class="form-control" id="draft_date" name="draft_date">
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="final_date" class="form-label">Final Date</label>
                    <input type="date" class="form-control" id="final_date" name="final_date">
                  </div>
                </div>
                    <div class="row">
                  
                </div>
                    <div class="row">
                  <div class="col-md-3 mb-3">
                    <label for="manager" class="form-label">Manager</label>
                    <input type="text" class="form-control" id="manager" name="manager">
                  </div>
                  <div class="col-md-3 mb-3">
                    <label for="senior" class="form-label">Senior</label>
                    <input type="text" class="form-control" id="senior" name="senior">
                  </div>
                  <div class="col-md-3 mb-3">
                    <label for="staff_1" class="form-label">Staff 1</label>
                    <input type="text" class="form-control" id="staff_1" name="staff_1">
                  </div>
                  <div class="col-md-3 mb-3">
                    <label for="staff_2" class="form-label">Staff 2</label>
                    <input type="text" class="form-control" id="staff_2" name="staff_2">
                  </div>
                </div>
                    <div class="row">
                  <div class="col-md-4 mb-3">
                    <label for="senior_dol" class="form-label">Senior DOL</label>
                    <input type="text" class="form-control" id="senior_dol" name="senior_dol">
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="staff_1_dol" class="form-label">Staff 1 DOL</label>
                    <input type="text" class="form-control" id="staff_1_dol" name="staff_1_dol">
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="staff_2_dol" class="form-label">Staff 2 DOL</label>
                    <input type="text" class="form-control" id="staff_2_dol" name="staff_2_dol">
                  </div>
                </div>
              </div>
                  <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="add_engagement" class="btn btn-primary">Add</button>
              </div>
            </form>
            </div>
      </div>
    </div>
<!-- end Modal -->