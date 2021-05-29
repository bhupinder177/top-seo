<?php

include('sidebar.php');
?>
<div class="content-wrapper">
    <section class="content-header">
      <h1>Employee Evaluation</h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Employee Evaluation</li>
      </ol>
    </section>
<section class="content main-ratings">
   <div class="no-margin">
              <div class="no-border-radius">
                    <div class="row">
                          <div class="col-md-12">
                            <div class="box">
                                <div class="box-body">
                                  <!-- body  -->

                                        <div class="employee-review-wrapper">
                                             <div class="employee-Information">
                                              <h4>Employee Information</h4>
                                           </div>
                                           <div class="inner-wrapper">
                                           <div class="main-wrapper">
                                              <div class="row">
                                                 <div class="col-md-8">
                                                    <div class="main-employee">
                                                       <div class="row">
                                                          <div class="col-md-3">
                                                             <label>Employee Name</label>
                                                          </div>
                                                          <div class="col-md-8">
                                                             <div class="form-group">
                                                                <select class="form-control" id="exampleFormControlSelect1">
                                                                   <option>Sandip</option>
                                                                   <option>Sunil</option>
                                                                   <option>Aman</option>
                                                                </select>
                                                             </div>
                                                          </div>
                                                       </div>
                                                    </div>
                                                 </div>
                                                 <div class="col-md-4">
                                                    <div class="row">
                                                       <div class="col-md-4">
                                                          <label>Employee ID </label>
                                                       </div>
                                                       <div class="col-md-8">
                                                          <div class="employee-id">
                                                             <div class="form-group">
                                                                <input type="text" name="text" class="form-control">
                                                             </div>
                                                          </div>
                                                       </div>
                                                    </div>
                                                 </div>
                                              </div>
                                           </div>
                                           <div class="main-wrapper">
                                              <div class="row">
                                                 <div class="col-md-8">
                                                    <div class="main-employee">
                                                       <div class="row">
                                                          <div class="col-md-3">
                                                             <label>Job Title</label>
                                                          </div>
                                                          <div class="col-md-8">
                                                             <div class="form-group">
                                                                <input type="text" name="text" class="form-control">
                                                             </div>
                                                          </div>
                                                       </div>
                                                    </div>
                                                 </div>
                                                 <div class="col-md-4">
                                                    <div class="row">
                                                       <div class="col-md-4">
                                                          <label>Date </label>
                                                       </div>
                                                       <div class="col-md-8">
                                                          <div class="employee-id">
                                                             <div class="form-group">
                                                                <input name="text" class="form-control">
                                                             </div>
                                                          </div>
                                                       </div>
                                                    </div>
                                                 </div>
                                              </div>
                                           </div>
                                           <div class="main-wrapper">
                                              <div class="row">
                                                 <div class="col-md-8">
                                                    <div class="main-employee">
                                                       <div class="row">
                                                          <div class="col-md-3">
                                                             <label>Department</label>
                                                          </div>
                                                          <div class="col-md-8">
                                                             <div class="form-group">
                                                                <select class="form-control" id="exampleFormControlSelect1">
                                                                   <option>Sandip</option>
                                                                   <option>Sunil</option>
                                                                   <option>Aman</option>
                                                                </select>
                                                             </div>
                                                          </div>
                                                       </div>
                                                    </div>
                                                 </div>
                                                 <div class="col-md-4">
                                                    <div class="row">
                                                       <div class="col-md-4">
                                                          <label>Reviewer</label>
                                                       </div>
                                                       <div class="col-md-8">
                                                          <div class="employee-id">
                                                             <div class="form-group">
                                                                <select class="form-control" id="exampleFormControlSelect1">
                                                                   <option>Sandip</option>
                                                                   <option>Sunil</option>
                                                                   <option>Aman</option>
                                                                </select>
                                                             </div>
                                                          </div>
                                                       </div>
                                                    </div>
                                                 </div>
                                              </div>
                                           </div>
                                           <div class="main-wrapper">
                                              <div class="row">
                                                 <div class="col-md-2">
                                                    <div class="review-period">
                                                       <label>Review Period</label>
                                                    </div>
                                                 </div>
                                                 <div class="col-md-3">
                                                    <div class="review-input">
                                                       <div class="form-group">
                                                          <input name="text" class="form-control">
                                                       </div>
                                                    </div>
                                                 </div>
                                                 <div class="col-md-3">
                                                    <div class="review-input">
                                                       <div class="form-group">
                                                          <input name="text" class="form-control">
                                                       </div>
                                                    </div>
                                                 </div>
                                              </div>
                                           </div>
                                         </div>
                                        </div>

                                     <!--employee ratings-->
                                     <div class="rating-wrapper">

                                              <div class="employee-Information">
                                                 <h4>Core Values and Objectives</h4>

                                              </div>
                                              <div class="important-ratings">
                                                 <table class="table">
                                                    <tbody>
                                                       <tr>
                                                          <th style="width:30%;">Performance Category</th>
                                                          <th>1=Poor</th>
                                                          <th>2=Fair</th>
                                                          <th>3=Satisfactory</th>
                                                          <th>4=Good</th>
                                                          <th>5=Excellent</th>
                                                       </tr>
                                                       <tr>
                                                          <td>Quality of Work:</td>
                                                          <td><input type="text" name="text" class="form-control"></td>
                                                          <td><input type="text" name="text" class="form-control"></td>
                                                          <td><input type="text" name="text" class="form-control"></td>
                                                          <td><input type="text" name="text" class="form-control"></td>
                                                          <td><input type="text" name="text" class="form-control"></td>
                                                       </tr>
                                                       <tr>
                                                          <td colspan="6"><p class="mb-0">Work is completed accurately (few or no errors), efficiently and within deadlines with minimal supervision</p></td>
                                                       </tr>
                                                       <tr class="p-0">
                                                          <td>Comment</td>
                                                          <td colspan="6"><textarea class="form-control"></textarea></td>
                                                       </tr>
                                                       <tr>
                                                          <td>Attendance & Punctuality:</td>
                                                          <td>
                                                             <div class="rating-value">
                                                                <input type="checkbox"  >
                                                             </div>
                                                          </td>
                                                          <td>
                                                             <div class="rating-value">
                                                                <input type="checkbox"  >
                                                             </div>
                                                          </td>
                                                          <td>
                                                             <div class="rating-value">
                                                                <input type="checkbox"  >
                                                             </div>
                                                          </td>
                                                          <td>
                                                             <div class="rating-value">
                                                                <input type="checkbox"  >
                                                             </div>
                                                          </td>
                                                          <td>
                                                             <div class="rating-value">
                                                                <input type="checkbox" name="text" value="Bike">
                                                             </div>
                                                          </td>
                                                       </tr>
                                                       <tr>
                                                          <td colspan="6"><p class="mb-0">Reports for work on time, provides advance notice of need for absence</p></td>
                                                       </tr>
                                                       <tr class="p-0">
                                                          <td>Comment</td>
                                                          <td colspan="6"><textarea class="form-control"></textarea></td>
                                                       </tr>
                                                       <tr>
                                                          <td>Reliability/Dependability:</td>
                                                          <td>
                                                             <div class="rating-value">
                                                                <input type="checkbox"  >
                                                             </div>
                                                          </td>
                                                          <td>
                                                             <div class="rating-value">
                                                                <input type="checkbox"  >
                                                             </div>
                                                          </td>
                                                          <td>
                                                             <div class="rating-value">
                                                                <input type="checkbox"  >
                                                             </div>
                                                          </td>
                                                          <td>
                                                             <div class="rating-value">
                                                                <input type="checkbox"  >
                                                             </div>
                                                          </td>
                                                          <td>
                                                             <div class="rating-value">
                                                                <input type="checkbox"  >
                                                             </div>
                                                          </td>
                                                       </tr>
                                                       <tr>
                                                          <td colspan="6"><p class="mb-0">Consistently performs at a high level; manages time and workload effectively to meet responsibilities.</p></td>
                                                       </tr>
                                                       <tr class="p-0">
                                                          <td>Comment</td>
                                                          <td colspan="6"> <textarea class="form-control"></textarea></td>
                                                       </tr>
                                                       <tr>
                                                          <td>Communication Skills:</td>
                                                          <td>
                                                             <div class="rating-value">
                                                                <input type="checkbox"  >
                                                             </div>
                                                          </td>
                                                          <td>
                                                             <div class="rating-value">
                                                                <input type="checkbox"  >
                                                             </div>
                                                          </td>
                                                          <td>
                                                             <div class="rating-value">
                                                                <input type="checkbox"  >
                                                             </div>
                                                          </td>
                                                          <td>
                                                             <div class="rating-value">
                                                                <input type="checkbox"  >
                                                             </div>
                                                          </td>
                                                          <td>
                                                             <div class="rating-value">
                                                                <input type="checkbox"  >
                                                             </div>
                                                          </td>
                                                       </tr>
                                                       <tr>
                                                          <td colspan="6"><p class="mb-0">Written and Verbal communications are clear, organized and effective; listens and comprehends well.</p></td>
                                                       </tr>
                                                       <tr class="p-0">
                                                          <td><b>Comment</b></td>
                                                          <td colspan="6"> <textarea class="form-control"></textarea></td>
                                                       </tr>
                                                       <!-- <tr>
                                                          <td colspan="6"></td>
                                                       </tr> -->
                                                       <tr>
                                                           <td><b>Judgement & Decision-Making:</b></td>
                                                          <td>
                                                             <div class="rating-value">
                                                                <input type="checkbox"  >
                                                             </div>
                                                          </td>
                                                          <td>
                                                             <div class="rating-value">
                                                                <input type="checkbox"  >
                                                             </div>
                                                          </td>
                                                          <td>
                                                             <div class="rating-value">
                                                                <input type="checkbox"  >
                                                             </div>
                                                          </td>
                                                          <td>
                                                             <div class="rating-value">
                                                                <input type="checkbox"  >
                                                             </div>
                                                          </td>
                                                          <td>
                                                             <div class="rating-value">
                                                                <input type="checkbox"  >
                                                             </div>
                                                          </td>
                                                       </tr>
                                                       <tr>
                                                          <td colspan="6"><p class="mb-0">Makes thoughtful, well-reasoned decisions; exercises good judgement, resourcefulness and creativity in problem-solving</p></td>
                                                       </tr>
                                                       <tr  class="p-0">
                                                          <td>Comment</td>
                                                          <td colspan="6"> <textarea class="form-control"></textarea></td>
                                                       </tr>
                                                       <tr>
                                                          <td colspan="6"></td>
                                                       </tr>
                                                       <tr>
                                                          <td>Initiative & Flexibility:</td>
                                                          <td>
                                                             <div class="rating-value">
                                                                <input type="checkbox"  >
                                                             </div>
                                                          </td>
                                                          <td>
                                                             <div class="rating-value">
                                                                <input type="checkbox"  >
                                                             </div>
                                                          </td>
                                                          <td>
                                                             <div class="rating-value">
                                                                <input type="checkbox"  >
                                                             </div>
                                                          </td>
                                                          <td>
                                                             <div class="rating-value">
                                                                <input type="checkbox"  >
                                                             </div>
                                                          </td>
                                                          <td>
                                                             <div class="rating-value">
                                                                <input type="checkbox"  >
                                                             </div>
                                                          </td>
                                                       </tr>
                                                       <tr>
                                                          <td colspan="6"><p class="mb-0">Demonstrates initiative, often seeking out additional responsibility; identifies problems and solutions; thrives on new challenges and adjusts to unexpected changes</p></td>
                                                       </tr>
                                                       <tr class="p-0">
                                                          <td>Comment</td>
                                                          <td colspan="6"> <textarea class="form-control"></textarea></td>
                                                       </tr>
                                                       <!-- <tr>
                                                          <td colspan="6"></td>
                                                       </tr> -->
                                                       <tr>
                                                          <td>Leadership Quality:</td>
                                                          <td>
                                                             <div class="rating-value">
                                                                <input type="checkbox"  >
                                                             </div>
                                                          </td>
                                                          <td>
                                                             <div class="rating-value">
                                                                <input type="checkbox"  >
                                                             </div>
                                                          </td>
                                                          <td>
                                                             <div class="rating-value">
                                                                <input type="checkbox"  >
                                                             </div>
                                                          </td>
                                                          <td>
                                                             <div class="rating-value">
                                                                <input type="checkbox"  >
                                                             </div>
                                                          </td>
                                                          <td>
                                                             <div class="rating-value">
                                                                <input type="checkbox"  >
                                                             </div>
                                                          </td>
                                                       </tr>
                                                       <tr>
                                                          <td colspan="6"><p class="mb-0">Inspire others, resolve conflicts, Empower team mates and able to handle team of 4-5 employees</p></td>
                                                       </tr>
                                                       <tr class="p-0">
                                                          <td>Comment</td>
                                                          <td colspan="6"> <textarea class="form-control"></textarea></td>
                                                       </tr>
                                                       <!-- <tr>
                                                          <td colspan="6"></td>
                                                       </tr> -->
                                                       <tr>
                                                          <td>Cooperation & Teamwork:</td>
                                                          <td>
                                                             <div class="rating-value">
                                                                <input type="checkbox"  >
                                                             </div>
                                                          </td>
                                                          <td>
                                                             <div class="rating-value">
                                                                <input type="checkbox"  >
                                                             </div>
                                                          </td>
                                                          <td>
                                                             <div class="rating-value">
                                                                <input type="checkbox"  >
                                                             </div>
                                                          </td>
                                                          <td>
                                                             <div class="rating-value">
                                                                <input type="checkbox"  >
                                                             </div>
                                                          </td>
                                                          <td>
                                                             <div class="rating-value">
                                                                <input type="checkbox"  >
                                                             </div>
                                                          </td>
                                                       </tr>
                                                       <tr>
                                                          <td colspan="6"><p class="mb-0">Respectful of colleagues when working with others and makes valuable contributions to help the group achieve its goals
                                                          </p>
                                                          </td>
                                                       </tr>
                                                       <tr class="p-0">
                                                          <td>Comment</td>
                                                          <td colspan="6"> <textarea class="form-control"></textarea></td>
                                                       </tr>

                                                    </tbody>
                                                 </table>
                                                   </div>
                                                 <div class="job-performance table-responsive">
                                                 <div class="employee-Information">
                                                    <h4>JOB-SPECIFIC PERFORMANCE CRITERIA</h4>
                                                 </div>
                                                 <table class="table">
                                                   <tbody>
                                                       <tr>
                                                          <td>Knowledge of Position:</td>
                                                          <td>
                                                             <div class="rating-value">
                                                                <input type="checkbox">
                                                             </div>
                                                          </td>
                                                          <td>
                                                             <div class="rating-value">
                                                                <input type="checkbox">
                                                             </div>
                                                          </td>
                                                          <td>
                                                             <div class="rating-value">
                                                                <input type="checkbox">
                                                             </div>
                                                          </td>
                                                          <td>
                                                             <div class="rating-value">
                                                                <input type="checkbox">
                                                             </div>
                                                          </td>
                                                          <td>
                                                             <div class="rating-value">
                                                                <input type="checkbox">
                                                             </div>
                                                          </td>
                                                       </tr>
                                                       <tr>
                                                          <td colspan="6"><p class="mb-0">Possesses required skills, knowledge, and abilities to competently perform the job   </p></td>
                                                       </tr>
                                                       <tr class="p-0">
                                                          <td>Comment</td>
                                                          <td colspan="5"> <textarea class="form-control"></textarea></td>
                                                       </tr>
                                                       <tr>
                                                          <td>Training & Development:</td>
                                                          <td>
                                                             <div class="rating-value">
                                                                <input type="checkbox"  >
                                                             </div>
                                                          </td>
                                                          <td>
                                                             <div class="rating-value">
                                                                <input type="checkbox"  >
                                                             </div>
                                                          </td>
                                                          <td>
                                                             <div class="rating-value">
                                                                <input type="checkbox"  >
                                                             </div>
                                                          </td>
                                                          <td>
                                                             <div class="rating-value">
                                                                <input type="checkbox"  >
                                                             </div>
                                                          </td>
                                                          <td>
                                                             <div class="rating-value">
                                                                <input type="checkbox"  >
                                                             </div>
                                                          </td>
                                                       </tr>
                                                       <tr>
                                                          <td colspan="6"><p class="mb-0">Continually seeks ways to strengthen performance and regularly monitors new developments in field of work</p></td>
                                                       </tr>
                                                       <tr class="p-0">
                                                          <td>Comment</td>
                                                          <td colspan="6"> <textarea class="form-control"></textarea></td>
                                                       </tr>

                                                   </tbody>
                                                 </table>
                                               </div>


                                               <div class="job-performance table-responsive">
                                               <div class="employee-Information">
                                                  <h4>Employee Goals</h4>
                                               </div>
                                               <table class="table">
                                                 <tbody>

                                                     <tr>
                                                        <td>Area of Focus</td>
                                                        <td>
                                                           <div class="rating-value">
                                                              <input type="checkbox">
                                                           </div>
                                                        </td>
                                                        <td colspan="1">Plan Objective </td>
                                                        <td colspan="3"></td>
                                                     </tr>
                                                     <tr>
                                                        <td>Expected Outcome</td>
                                                        <td class="spac">
                                                           <div class="rating-value">
                                                              <input type="checkbox">
                                                           </div>
                                                        </td>
                                                        <td colspan="1">Plan Start Date </td>
                                                        <td class="spac"><input type="checkbox"></td>
                                                        <td>Plan End Date</td>
                                                        <td class="spac"></td>

                                                     </tr>
                                                     <tr class="p-0">
                                                        <td>Additional Comments</td>
                                                        <td colspan="5"> <textarea class="form-control"></textarea></td>

                                                     </tr>
                                                     <tr>
                                                        <td colspan="6"><p class="mb-0">Set objectives and outline steps to improve in problem areas or further employee development.</p></td>
                                                     </tr>

                                                 </tbody>
                                               </table>
                                             </div>




                                             <div class="job-performance table-responsive">
                                             <div class="employee-Information">
                                                <h4>Overall Rating</h4>
                                             </div>
                                             <table class="table">
                                               <tbody>
                                                   <tr>
                                                      <td colspan="6"><span><p class="mb-0">Consistently Exceeds Expectations	Frequently Exceeds Expectations	Fully Meets Expectations	Partially Meets Expectations</p></span></td>
                                                   </tr>
                                                   <tr>
                                                      <td colspan="6"><p class="mb-0">Employee consistently performs at a high level that Consistently Exceeds Expectations	Employee satisfies all essential job requirements; may exceed expectations periodically; demonstrates likelihood of eventually exceeding expectations	Employee consistently performs below required standards/expectations for the position; training or other action is necessary to correct performance	Employee is Performing not good. But we can provide some senior Guidance or we can shuffle the projects.</p></td>
                                                   </tr>
                                                   <tr>
                                                      <td colspan="1">Overall Rating</td>
                                                      <td></td>

                                                   </tr>
                                                   <tr>
                                                      <td colspan="6"><p class="mb-0">Continually seeks ways to strengthen performance and regularly monitors new developments in field of work</p></td>
                                                   </tr>
                                               </tbody>
                                             </table>
                                           </div>
                                           <!--Employee Comments (Optional)-->


                                           <div class="job-performance table-responsive">
                                           <div class="employee-Information" >
                                              <h4>Employee Comments (Optional)</h4>
                                           </div>
                                           <table class="table">
                                             <tbody>
                                                 <tr>
                                                   <td colspan="6">
                                                   <textarea class="form-control"></textarea>
                                                 </td>
                                                 </tr>
                                             </tbody>
                                           </table>
                                         </div>


                                         <div class="job-performance table-responsive">
                                         <div class="employee-Information" >
                                            <h4>Acknowledgement</h4>
                                         </div>
                                         <table class="table">
                                           <tbody>
                                             <tr>
                                                <td colspan="6"><p class="mb-0">I acknowledge that I have had the opportunity to discuss this performance evaluation with my manager and I have received a copy of this evaluation.</p></td>
                                             </tr>
                                             <tr>
                                               <td>Employee Signature</td>
                                               <td></td>
                                               <td></td>
                                               <td>Date</td>
                                               <td></td>
                                               <td></td>
                                             </tr>
                                             <tr>
                                               <td>Manager Signature</td>
                                               <td></td>
                                               <td></td>
                                               <td>Date</td>
                                               <td></td>
                                               <td></td>
                                             </tr>
                                           </tbody>
                                         </table>
                                       </div>





                                     </div>




                                  <!-- body -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
          </div>
       </section>
</div>
