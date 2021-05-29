<?php //print_r($packages);
?>
<div class="container-fluid">
  <div class="membership-table">
    <h1>MEMBERSHIP PLANS</h1>
    <div class="table-responsive">
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>Package Detail</th>
            <?php
            if (!empty($packages)) {
              foreach ($packages as $p) {
                ?>
                <th><?php
                echo $p->packageName;
                ?></th>
                <?php
              }
            }
            ?>
          </tr>

        </thead>
      </table>
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th colspan="3" class="text-center">Baisc Information</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Price in USD</td>
            <?php
            if (!empty($packages)) {
              foreach ($packages as $p) {
                ?>
                <td><?php
                echo $p->packagePrice;
                ?></td>
                <?php
              }
            }
            ?>
          </tr>
          <tr>
            <td>Duration</td>
            <?php
            if (!empty($packages)) {
              foreach ($packages as $p) {
                ?>
                <td><?php
                if ($p->packageDuration == 1) {
                  echo "Monthly";
                } else if ($p->packageDuration == 2) {
                  echo "Yearly";
                }
                ?></td>
                <?php
              }
            }
            ?>
          </tr>
          <tr>
            <td>Company Profile</td>
            <?php
            if (!empty($packages)) {
              foreach ($packages as $p) {
                ?>
                <td><?php
                if ($p->packageProfile == 1) {
                  echo "Yes";
                } else if ($p->packageProfile == 0) {
                  echo "No";
                }
                ?></td>
                <?php
              }
            }
            ?>
          </tr>
          <tr>
            <td>Hourly</td>
            <?php
            if (!empty($packages)) {
              foreach ($packages as $p) {
                ?>
                <td><?php
                if ($p->packageHourly == 1) {
                  echo "Yes";
                } else if ($p->packageHourly == 0) {
                  echo "No";
                }
                ?></td>
                <?php
              }
            }
            ?>
          </tr>

          <tr>
            <td>Custom Title and Description</td>
            <?php
            if (!empty($packages)) {
              foreach ($packages as $p) {
                ?>
                <td><?php
                if ($p->packageCustomTitle == 1) {
                  echo "Yes";
                } else if ($p->packageCustomTitle == 0) {
                  echo "No";
                }
                ?></td>
                <?php
              }
            }
            ?>
          </tr>

          <tr>
            <td>Number of Industries</td>
            <?php
            if (!empty($packages)) {
              foreach ($packages as $p) {
                ?>
                <td><?php
                echo $p->packageIndustry;
                ?></td>
                <?php
              }
            }
            ?>
          </tr>

          <tr>
            <td>Number of Services</td>
            <?php
            if (!empty($packages)) {
              foreach ($packages as $p) {
                ?>
                <td><?php
                echo $p->packageService;
                ?></td>
                <?php
              }
            }
            ?>
          </tr>

          <tr>
            <td>Custom Your Service Briefing</td>
            <?php
            if (!empty($packages)) {
              foreach ($packages as $p) {
                ?>
                <td><?php
                echo $p->packageServiceBriefing;
                ?></td>
                <?php
              }
            }
            ?>
          </tr>

          <tr>
            <td>Packages</td>
            <?php
            if (!empty($packages)) {
              foreach ($packages as $p) {
                ?>
                <td><?php
                echo $p->packageServicePricing;
                ?></td>
                <?php
              }
            }
            ?>
          </tr>

          <tr>
            <td>Testimonial</td>
            <?php
            if (!empty($packages)) {
              foreach ($packages as $p) {
                ?>
                <td><?php
                echo $p->packageTestimonial;
                ?></td>
                <?php
              }
            }
            ?>
          </tr>

          <tr>
            <td>Case Study</td>
            <?php
            if (!empty($packages)) {
              foreach ($packages as $p) {
                ?>
                <td><?php
                echo $p->packageCaseStudies;
                ?></td>
                <?php
              }
            }
            ?>
          </tr>

          <tr>
            <td>Choose A Currency</td>
            <?php
            if (!empty($packages)) {
              foreach ($packages as $p) {
                ?>
                <td><?php
                if ($p->packageCurrency == 1) {
                  echo "Yes";
                } else if ($p->packageCurrency == 0) {
                  echo "No";
                }
                ?></td>


                <?php
              }
            }
            ?>
          </tr>

          <tr>
            <td>Review Submission</td>
            <?php
            if (!empty($packages)) {
              foreach ($packages as $p) {
                ?>
                <td><?php
                if ($p->packageReview == 1) {
                  echo "Yes";
                } else if ($p->packageReview == 0) {
                  echo "No";
                }
                ?></td>

                <?php
              }
            }
            ?>
          </tr>

          <tr>
            <td>Consideration for Rankings</td>
            <?php
            if (!empty($packages)) {
              foreach ($packages as $p) {
                ?>
                <td><?php
                if ($p->packageRanking == 1) {
                  echo "Yes";
                } else if ($p->packageRanking == 0) {
                  echo "No";
                }
                ?></td>



                <?php
              }
            }
            ?>
          </tr>

          <tr>
            <td>Preffered Location</td>
            <?php
            if (!empty($packages)) {
              foreach ($packages as $p) {
                ?>
                <td><?php
                echo $p->packagePreferredLocation;
                ?></td>
                <?php
              }
            }
            ?>
          </tr>

          <tr>
            <td>Removal of Negative Reviews</td>
            <?php
            if (!empty($packages)) {
              foreach ($packages as $p) {
                ?>
                <td><?php
                echo $p->packageRemovalReview;
                ?></td>
                <?php
              }
            }
            ?>
          </tr>


          <!-- <tr>
          <td>Group Chat</td>
          <?php //if(!empty($packages))
          {
          //foreach($packages as $p)
          {
          ?>
          <td><?php //echo $p->packageGroupChat;
          ?></td>
          <?php
        }
      }
      ?>
    </tr> -->

    <tr>
      <td>Guest Post</td>
      <?php
      if (!empty($packages)) {
        foreach ($packages as $p) {
          ?>
          <td><?php
          if ($p->packageGuestPost == 1) {
            echo "Yes";
          } else if ($p->packageGuestPost == 0) {
            echo "No";
          }
          ?></td>
          <?php
        }
      }
      ?>
    </tr>


    <tr>
      <td>Manage Fund </td>
      <?php
      if (!empty($packages)) {
        foreach ($packages as $p) {
          ?>
          <td><?php
          if ($p->packageManageFund == 1) {
            echo "Yes";
          } else if ($p->packageManageFund == 0) {
            echo "No";
          }
          ?></td>
          <?php
        }
      }
      ?>
    </tr>

    <tr>
      <td>Task Management</td>
      <?php
      if (!empty($packages)) {
        foreach ($packages as $p) {
          ?>
          <td><?php
          if ($p->packageTaskManagement == 1) {
            echo "Yes";
          } else if ($p->packageTaskManagement == 0) {
            echo "No";
          }
          ?></td>
          <?php
        }
      }
      ?>
    </tr>
  </table>


  <table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th colspan="3" class="text-center">HR System</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Team</td>
        <?php
        if (!empty($packages)) {
          foreach ($packages as $p) {
            ?>
            <td><?php
            echo $p->packageTeam;
            ?></td>
            <?php
          }
        }
        ?>
      </tr>

      <tr>
        <td>Conference</td>
        <?php
        if (!empty($packages)) {
          foreach ($packages as $p) {
            ?>
            <td><?php
            if ($p->packageConference == 1) {
              echo "Yes";
            } else if ($p->packageConference == 0) {
              echo "No";
            }
            ?></td>
            <?php
          }
        }
        ?>
      </tr>

      <tr>
        <td>Team Profile</td>
        <?php
        if (!empty($packages)) {
          foreach ($packages as $p) {
            ?>
            <td><?php
            if ($p->packageTeamProfile == 1) {
              echo "Yes";
            } else if ($p->packageTeamProfile == 0) {
              echo "No";
            }
            ?></td>
            <?php
          }
        }
        ?>
      </tr>


      <tr>
        <td>Add Departement</td>
        <?php
        if (!empty($packages)) {
          foreach ($packages as $p) {
            ?>
            <td><?php
            if ($p->packageDepartment == 1) {
              echo "Yes";
            } else if ($p->packageDepartment == 0) {
              echo "No";
            }
            ?></td>
            <?php
          }
        }
        ?>
      </tr>


      <tr>
        <td>Salary</td>
        <?php
        if (!empty($packages)) {
          foreach ($packages as $p) {
            ?>
            <td><?php
            if ($p->packageSalary == 1) {
              echo "Yes";
            } else if ($p->packageSalary == 0) {
              echo "No";
            }
            ?></td>

            <?php
          }
        }
        ?>
      </tr>


      <tr>
        <td>Attdendance</td>
        <?php
        if (!empty($packages)) {
          foreach ($packages as $p) {
            ?>
            <td><?php
            if ($p->packageAttdendance == 1) {
              echo "Yes";
            } else if ($p->packageAttdendance == 0) {
              echo "No";
            }
            ?></td>
            <?php
          }
        }
        ?>
      </tr>


      <tr>
        <td>Announcement</td>
        <?php
        if (!empty($packages)) {
          foreach ($packages as $p) {
            ?>
            <td><?php
            if ($p->packageAnnouncement == 1) {
              echo "Yes";
            } else if ($p->packageAnnouncement == 0) {
              echo "No";
            }
            ?></td>

            <?php
          }
        }
        ?>
      </tr>

      <tr>
        <td>Performance -360 Feedback </td>
        <?php
        if (!empty($packages)) {
          foreach ($packages as $p) {
            ?>
            <td><?php
            if ($p->packagePerformance == 1) {
              echo "Yes";
            } else if ($p->packagePerformance == 0) {
              echo "No";
            }
            ?></td>
            <?php
          }
        }
        ?>
      </tr>


      <tr>
        <td>Increment History  </td>
        <?php
        if (!empty($packages)) {
          foreach ($packages as $p) {
            ?>
            <td><?php
            if ($p->packageIncrement == 1) {
              echo "Yes";
            } else if ($p->packageIncrement == 0) {
              echo "No";
            }
            ?></td>
            <?php
          }
        }
        ?>
      </tr>


      <tr>
        <td>Annual Holiday List  </td>
        <?php
        if (!empty($packages)) {
          foreach ($packages as $p) {
            ?>
            <td><?php
            if ($p->packageHoliday == 1) {
              echo "Yes";
            } else if ($p->packageHoliday == 0) {
              echo "No";
            }
            ?></td>
            <?php
          }
        }
        ?>
      </tr>


      <tr>
        <td>Create Leave Type </td>
        <?php
        if (!empty($packages)) {
          foreach ($packages as $p) {
            ?>
            <td><?php
            if ($p->packageLeaveType == 1) {
              echo "Yes";
            } else if ($p->packageLeaveType == 0) {
              echo "No";
            }
            ?></td>
            <?php
          }
        }
        ?>
      </tr>


      <tr>
        <td>Apply For Leave </td>
        <?php
        if (!empty($packages)) {
          foreach ($packages as $p) {
            ?>
            <td><?php
            if ($p->packageLeave == 1) {
              echo "Yes";
            } else if ($p->packageLeave == 0) {
              echo "No";
            }
            ?></td>
            <?php
          }
        }
        ?>
      </tr>


      <tr>
        <td>Apply For Resignation  </td>
        <?php
        if (!empty($packages)) {
          foreach ($packages as $p) {
            ?>
            <td><?php
            if ($p->packageResignation == 1) {
              echo "Yes";
            } else if ($p->packageResignation == 0) {
              echo "No";
            }
            ?></td>
            <?php
          }
        }
        ?>
      </tr>

    </tbody>
  </table>
  <table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th colspan="3" class="text-center">Recruitment</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Job Opening </td>
        <?php
        if (!empty($packages)) {
          foreach ($packages as $p) {
            ?>
            <td><?php
            if ($p->packageJobOpening == 1) {
              echo "Yes";
            } else if ($p->packageJobOpening == 0) {
              echo "No";
            }
            ?></td>
            <?php
          }
        }
        ?>
      </tr>


      <tr>
        <td>Candidate Add </td>
        <?php
        if (!empty($packages)) {
          foreach ($packages as $p) {
            ?>
            <td><?php
            if ($p->packageCandidateAdd == 1) {
              echo "Yes";
            } else if ($p->packageCandidateAdd == 0) {
              echo "No";
            }
            ?></td>
            <?php
          }
        }
        ?>
      </tr>
      <tr>
        <td>Setup For Interviews </td>
        <?php
        if (!empty($packages)) {
          foreach ($packages as $p) {
            ?>
            <td><?php
            if ($p->packageInterview == 1) {
              echo "Yes";
            } else if ($p->packageInterview == 0) {
              echo "No";
            }
            ?></td>
            <?php
          }
        }
        ?>
      </tr>

      <tr>
        <td>Interview Feedback </td>
        <?php
        if (!empty($packages)) {
          foreach ($packages as $p) {
            ?>
            <td><?php
            if ($p->packageInterviewFeedback == 1) {
              echo "Yes";
            } else if ($p->packageInterviewFeedback == 0) {
              echo "No";
            }
            ?></td>
            <?php
          }
        }
        ?>
      </tr>

    </tbody>
  </table>

  <table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th colspan="3" class="text-center">Accounts</th>
      </tr>
    </thead>
    <tbody>

      <tr>
        <td>Expense  </td>
        <?php
        if (!empty($packages)) {
          foreach ($packages as $p) {
            ?>
            <td><?php
            if ($p->packageExpense == 1) {
              echo "Yes";
            } else if ($p->packageExpense == 0) {
              echo "No";
            }
            ?></td>
            <?php
          }
        }
        ?>
      </tr>


      <tr>
        <td>Invoice  </td>
        <?php
        if (!empty($packages)) {
          foreach ($packages as $p) {
            ?>
            <td><?php
            if ($p->packageInvoice == 1) {
              echo "Yes";
            } else if ($p->packageInvoice == 0) {
              echo "No";
            }
            ?></td>
            <?php
          }
        }
        ?>
      </tr>


      <tr>
        <td>Income  </td>
        <?php
        if (!empty($packages)) {
          foreach ($packages as $p) {
            ?>
            <td><?php
            if ($p->packageIncome == 1) {
              echo "Yes";
            } else if ($p->packageIncome == 0) {
              echo "No";
            }
            ?></td>
            <?php
          }
        }
        ?>
      </tr>

    </tbody>
  </table>

  <table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th colspan="3" class="text-center">Daily Status Report</th>
      </tr>
    </thead>
    <tbody>


      <tr>
        <td>Manage Employee Dsr  </td>
        <?php
        if (!empty($packages)) {
          foreach ($packages as $p) {
            ?>
            <td><?php
            if ($p->packageDsr == 1) {
              echo "Yes";
            } else if ($p->packageDsr == 0) {
              echo "No";
            }
            ?></td>
            <?php
          }
        }
        ?>
      </tr>


      <tr>
        <td>Timesheet </td>
        <?php
        if (!empty($packages)) {
          foreach ($packages as $p) {
            ?>
            <td><?php
            if ($p->packageTimesheet == 1) {
              echo "Yes";
            } else if ($p->packageTimesheet == 0) {
              echo "No";
            }
            ?></td>
            <?php
          }
        }
        ?>
      </tr>


      <tr>
        <td>Dsr Approved | DisApproved | Remark  </td>
        <?php
        if (!empty($packages)) {
          foreach ($packages as $p) {
            ?>
            <td><?php
            if ($p->packageDsrRemark == 1) {
              echo "Yes";
            } else if ($p->packageDsrRemark == 0) {
              echo "No";
            }
            ?></td>
            <?php
          }
        }
        ?>
      </tr>
    </tbody>
  </table>

  <!-- sales system -->
  <table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th colspan="3" class="text-center">Sales System</th>
      </tr>
    </thead>
    <tbody>


      <tr>
        <td>Key People</td>
        <?php
        if (!empty($packages)) {
          foreach ($packages as $p) {
            ?>
            <td><?php
            echo $p->packageKeyPeople;
            ?></td>
            <?php
          }
        }
        ?>
      </tr>

      <tr>
        <td>Request A Quote</td>
        <?php
        if (!empty($packages)) {
          foreach ($packages as $p) {
            ?>
            <td><?php
            if ($p->packageRequestQuote == 1) {
              echo "Yes";
            } else if ($p->packageRequestQuote == 0) {
              echo "No";
            }
            ?></td>
            <?php
          }
        }
        ?>
      </tr>


      <tr>
        <td>Lead Management</td>
        <?php
        if (!empty($packages)) {
          foreach ($packages as $p) {
            ?>
            <td><?php
            if ($p->packageLead == 1) {
              echo "Yes";
            } else if ($p->packageLead == 0) {
              echo "No";
            }
            ?></td>
            <?php
          }
        }
        ?>
      </tr>

      <tr>
        <td>Lead History </td>
        <?php
        if (!empty($packages)) {
          foreach ($packages as $p) {
            ?>
            <td><?php
            if ($p->packageLeadHistory == 1) {
              echo "Yes";
            } else if ($p->packageLeadHistory == 0) {
              echo "No";
            }
            ?></td>
            <?php
          }
        }
        ?>
      </tr>

      <tr>
        <td>Create A Project </td>
        <?php
        if (!empty($packages)) {
          foreach ($packages as $p) {
            ?>
            <td><?php
            if ($p->packageCreateProject == 1) {
              echo "Yes";
            } else if ($p->packageCreateProject == 0) {
              echo "No";
            }
            ?></td>
            <?php
          }
        }
        ?>
      </tr>


    </tbody>
  </table>
  <!-- sales system -->

  <!-- project managment -->
  <table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th colspan="3" class="text-center">Project Management System</th>
      </tr>
    </thead>
    <tbody>

      <tr>
        <td>Assign Project  </td>
        <?php
        if (!empty($packages)) {
          foreach ($packages as $p) {
            ?>
            <td><?php
            if ($p->packageAssignProject == 1) {
              echo "Yes";
            } else if ($p->packageAssignProject == 0) {
              echo "No";
            }
            ?></td>
            <?php
          }
        }
        ?>
      </tr>

      <tr>
        <td>Project Managment</td>
        <?php
        if (!empty($packages)) {
          foreach ($packages as $p) {
            ?>
            <td><?php
            if ($p->packageProjectManagment == 1) {
              echo "Yes";
            } else if ($p->packageProjectManagment == 0) {
              echo "No";
            }
            ?></td>
            <?php
          }
        }
        ?>
      </tr>

      <tr>
        <td>Assign Team </td>
        <?php
        if (!empty($packages)) {
          foreach ($packages as $p) {
            ?>
            <td><?php
            if ($p->packageAssignTeam == 1) {
              echo "Yes";
            } else if ($p->packageAssignTeam == 0) {
              echo "No";
            }
            ?></td>
            <?php
          }
        }
        ?>
      </tr>

      <tr>
        <td>Manage Team Task </td>
        <?php
        if (!empty($packages)) {
          foreach ($packages as $p) {
            ?>
            <td><?php
            if ($p->packageManageTeamTask == 1) {
              echo "Yes";
            } else if ($p->packageManageTeamTask == 0) {
              echo "No";
            }
            ?></td>
            <?php
          }
        }
        ?>
      </tr>

    </tbody>
  </table>
  <!-- project managment -->

  <!-- return on investement -->
  <table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th colspan="3" class="text-center">Return On investement</th>
      </tr>
    </thead>
    <tbody>


      <tr>
        <td>ROI</td>
        <?php
        if (!empty($packages)) {
          foreach ($packages as $p) {
            ?>
            <td><?php
            if ($p->packageRoi == 1) {
              echo "Yes";
            } else if ($p->packageRoi == 0) {
              echo "No";
            }
            ?></td>
            <?php
          }
        }
        ?>
      </tr>

      <tr>
        <td>Company Roi </td>
        <?php
        if (!empty($packages)) {
          foreach ($packages as $p) {
            ?>
            <td><?php
            if ($p->packageCompanyRoi == 1) {
              echo "Yes";
            } else if ($p->packageCompanyRoi == 0) {
              echo "No";
            }
            ?></td>
            <?php
          }
        }
        ?>
      </tr>


    </tbody>
  </table>
  <!-- return on investement -->

  <!-- payment method -->
  <table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th colspan="3" class="text-center">Payment method</th>
      </tr>
    </thead>
    <tbody>

      <tr>
        <td>Paypal Detail </td>
        <?php
        if (!empty($packages)) {
          foreach ($packages as $p) {
            ?>
            <td><?php
            if ($p->packagePaypal == 1) {
              echo "Yes";
            } else if ($p->packagePaypal == 0) {
              echo "No";
            }
            ?></td>
            <?php
          }
        }
        ?>
      </tr>

      <tr>
        <td>Bank Detail</td>
        <?php
        if (!empty($packages)) {
          foreach ($packages as $p) {
            ?>
            <td><?php
            if ($p->packageBank == 1) {
              echo "Yes";
            } else if ($p->packageBank == 0) {
              echo "No";
            }
            ?></td>
            <?php
          }
        }
        ?>
      </tr>


    </tbody>
  </table>
  <!-- payment method -->

  <!-- communication -->
  <table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th colspan="3" class="text-center">Communication</th>
      </tr>
    </thead>
    <tbody>

      <tr>
        <td>Real Time Chat</td>
        <?php
        if (!empty($packages)) {
          foreach ($packages as $p) {
            ?>
            <td><?php
            if ($p->packageChat == 1) {
              echo "Yes";
            } else if ($p->packageChat == 0) {
              echo "No";
            }
            ?></td>
            <?php
          }
        }
        ?>
      </tr>


      <tr>
        <td>Email </td>
        <?php
        if (!empty($packages)) {
          foreach ($packages as $p) {
            ?>
            <td><?php
            if ($p->packageEmail == 1) {
              echo "Yes";
            } else if ($p->packageEmail == 0) {
              echo "No";
            }
            ?></td>
            <?php
          }
        }
        ?>
      </tr>

      <tr>
        <td>Phone </td>
        <?php
        if (!empty($packages)) {
          foreach ($packages as $p) {
            ?>
            <td><?php
            if ($p->packagePhone == 1) {
              echo "Yes";
            } else if ($p->packagePhone == 0) {
              echo "No";
            }
            ?></td>
            <?php
          }
        }
        ?>
      </tr>

      <tr>
        <td>Skype</td>
        <?php
        if (!empty($packages)) {
          foreach ($packages as $p) {
            ?>
            <td><?php
            if ($p->packageSkype == 1) {
              echo "Yes";
            } else if ($p->packageSkype == 0) {
              echo "No";
            }
            ?></td>
            <?php
          }
        }
        ?>
      </tr>

      <tr>
        <td>Support On Email and Live Chat</td>
        <?php
        if (!empty($packages)) {
          foreach ($packages as $p) {
            ?>
            <td><?php
            if ($p->packageSupport == 1) {
              echo "Yes";
            } else if ($p->packageSupport == 0) {
              echo "No";
            }
            ?></td>
            <?php
          }
        }
        ?>
      </tr>

    </tbody>
  </table>
  <!-- communication -->

  <!-- social media -->

  <table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th colspan="3" class="text-center">Social media Platforms</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>
          Facebook
        </td>
        <?php
        if (!empty($packages)) {
          foreach ($packages as $p) {
            ?>
        <td>
          Yes
        </td>
      <?php } } ?>
      </tr>

      <tr>
        <td>
          Twitter
        </td>
        <?php
        if (!empty($packages)) {
          foreach ($packages as $p) {
            ?>
        <td>
          Yes
        </td>
      <?php } } ?>
      </tr>

      <tr>
        <td>
          LinkedIn
        </td>
        <?php
        if (!empty($packages)) {
          foreach ($packages as $p) {
            ?>
        <td>
          Yes
        </td>
      <?php } } ?>
      </tr>


      <tr>
        <td>
          Youtube
        </td>
        <?php
        if (!empty($packages)) {
          foreach ($packages as $p) {
            ?>
        <td>
          Yes
        </td>
      <?php } } ?>
      </tr>

      <tr>
        <td>
          Instagram
        </td>
        <?php
        if (!empty($packages)) {
          foreach ($packages as $p) {
            ?>
        <td>
          Yes
        </td>
      <?php } } ?>
      </tr>

      <tr>
        <td>
          Pinterest
        </td>
        <?php
        if (!empty($packages)) {
          foreach ($packages as $p) {
            ?>
        <td>
          Yes
        </td>
      <?php } } ?>
      </tr>

      <tr>
        <td></td>
        <?php
        if (!empty($packages)) {
          foreach ($packages as $p) {
            if ($p->packagePrice == "FREE") {

              ?>
              <td><a class="btn signup-btn" href="<?php
              echo base_url();
              ?>register">Sign up</a></td>
              <?php
            } else {
              ?>
              <td><a class="btn signup-btn" href="<?php
              echo base_url();
              ?>register/<?php
              echo $p->packageId;
              ?>">Sign up</a></td>
              <?php

            }
          }
        }
        ?>
      </tr>

    </tbody>
  </table>
  <!-- social media -->
  <div class="membership-content"><?php
  if (!empty($content)) {
    echo $content->content;
  }
  ?></div>
</div>

</div>
</div>
