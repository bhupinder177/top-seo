<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

 function getPagination($perPage,$totalItem = 0,$url,$uri, $numbr) {

    $ci = & get_instance();

    $config['base_url'] = $url;
    $config['total_rows'] = $totalItem;
    $config['per_page'] = $perPage;
    $config["uri_segment"] = $uri;
    $config["page_query_string"] = false;


    $config["num_links"] = 2;
    $config["use_page_numbers"] = TRUE;
    $config['full_tag_open'] = '<ul class="pagination" id="ajax_pagingsearc' . $numbr . '">';
    $config['full_tag_close'] = '</ul>';
    $config['first_link'] = false;
    $config['last_link'] = false;
    $config['first_tag_open'] = '<li>';
    $config['first_tag_close'] = '</li>';
    $config['prev_link'] = '&laquo';
    $config['prev_tag_open'] = '<li class="prev">';
    $config['prev_tag_close'] = '</li>';
    $config['next_link'] = '&raquo';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';
    $config['last_tag_open'] = '<li>';
    $config['last_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="active"><a  href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';

    $ci->pagination->initialize($config);
    return $ci->pagination->create_links();
}

 function get($table,$where)
 {
   $ci = & get_instance();
   $ci->db->select('*');
   $ci->db->from($table);
   $ci->db->where($where);
   $output = $ci->db->get();
   $output = $output->result();
   return $output;
 }

 function getleave($where)
 {
   $ci = & get_instance();
   $ci->db->select('l.remark,m.name,l.status,t.type');
   $ci->db->from('user_leave as l');
   $ci->db->join('user_meta as m','m.u_id = l.employeeId');
   $ci->db->join('leavetype as t','t.id = l.type');
   $ci->db->where($where);
   $output = $ci->db->get();
   $output = $output->result();
   return $output;
 }

 function getTodayinterview($where)
 {
   $ci = & get_instance();
   $ci->db->select('i.interviewFeedback1,c.candidateName,i.interviewTime');
   $ci->db->from('interview as i');
   $ci->db->join('candidate as c','c.candidateId = i.candidateId');
   // $ci->db->join('user_meta as m','m.u_id = i.employeeId');m.name,
   $ci->db->where($where);
   $output = $ci->db->get();
   $output = $output->result();
   return $output;
 }

 function getNotification($where)
 {
   $ci = & get_instance();
   $ci->db->select('*');
   $ci->db->from('user_notification');
   $ci->db->where($where);
   $ci->db->order_by('notificationId','desc');
   $ci->db->limit('5');
   $output = $ci->db->get();
   $output = $output->result();
   return $output;
 }

 function getCountNotification($where)
 {
   $ci = & get_instance();
   $ci->db->select('*');
   $ci->db->from('user_notification');
   $ci->db->where($where);
   $ci->db->order_by('notificationId','desc');
   $ci->db->limit('5');
   $output = $ci->db->count_all_results();
   return $output;
 }

 function getIn($table,$field,$ids)
 {
   $ci = & get_instance();
   $ci->db->select('*');
   $ci->db->from($table);
   $ci->db->where_in($field,$ids);
   // $res = $ci->db->last_query();
   // print_r($res);
   // die;
   $output = $ci->db->get();
   $output = $output->result();
   return $output;
 }

 function getrow($table,$where)
 {
   $ci = & get_instance();
   $ci->db->select('*');
   $ci->db->from($table);
   $ci->db->where($where);
   $output = $ci->db->get();
   $output = $output->row();
   return $output;
 }
 function getTable($table)
 {
   $ci = & get_instance();

   $ci->db->select('*');
   $ci->db->from($table);
   $output = $ci->db->get();
   $output = $output->result();
   return $output;
 }

 function getbygroup($table,$field)
 {
  $ci = & get_instance();
  $ci->db->select('id,country');
  $ci->db->from($table);
  $ci->db->group_by($field);
  $str = $ci->db->last_query();

  $output = $ci->db->get();

  $output = $output->result();
  return $output;
}

 function getUserInd($table,$where)
 {
   $ci = & get_instance();
   $ci->db->select('*');
   $ci->db->from($table);
   $ci->db->where_in('id',$where);
   $output = $ci->db->get();
   $output = $output->result();
   return $output;
 }

 function getRating($table,$where)
 {
   $ci = & get_instance();
   $ci->db->select('*');
   $ci->db->from($table);
   $ci->db->where_in('u_id',$where);
   $output = $ci->db->get();
   $output = $output->result();
   return $output;
 }

  function getfreelancerPlan($whr)
 {
   $ci = & get_instance();
   $ci->db->select('*');
   $ci->db->from('user_membership as m');
   $ci->db->join('packages as p','m.packageId = p.packageId');
   $ci->db->where($whr);
   $result = $ci->db->get();
   $result = $result->row();
   return $result;
 }

function getoverallRating($table,$whr)
{
  $ci = & get_instance();
  $ci->db->select('*');
  $ci->db->from($table);
  $ci->db->where($whr);
  $profile_rev = $ci->db->get();
  $profile_rev = $profile_rev->result();
  //return $profile_rev;
	 $return = [];

	 $avgRat = $avg_comm = $avg_resp = $avg_qlty = $avg_money = $avg_results = 0.0;

	 if($profile_rev)
  {
     // $profile_reviews = unserialize($profile_rev->review_detail);
		$return['total'] = $total = count($profile_rev);

		foreach($profile_rev as $review){

			$rev_detail = unserialize($review->review_detail);

			$avg_comm += (float)$rev_detail['rate_comm'];

			$avg_resp += (float)$rev_detail['rate_resp'];

			$avg_qlty += (float)$rev_detail['rate_qlty'];

			$avg_money += (float)$rev_detail['rate_money'];

			$avg_results += (float)$rev_detail['rate_results'];

			$avgRat += (float)$rev_detail['avg_rate'];

		}

		$return['avg_comm'] = round($avg_comm/$total, 1);

		$return['avg_resp'] = round($avg_resp/$total, 1);

		$return['avg_qlty'] = round($avg_qlty/$total, 1);

		$return['avg_money'] = round($avg_money/$total, 1);

		$return['avg_results'] = round($avg_results/$total, 1);

		$return['avg_overallRating'] = round($avgRat/$total, 1);

		//return $return;

	}

	return $return;

}


function getcount($tbl,$where)
{
  $ci = & get_instance();
  $ci->db->select('*');
  $ci->db->from($tbl);
  $ci->db->where($where);
  $output = $ci->db->count_all_results();
  return $output;
}


 function count_today_ActiveTask($tbl,$whr)
{
  $ci = & get_instance();
  // $ci->db->where('startDate <=',$date);
  // $ci->db->where('dueDate >=',$date);
  $ci->db->where($whr);
  $ci->db->from($tbl);
  $count = $ci->db->count_all_results();
  return  $count;
}

function count_today_pendingTask($tbl,$whr)
{
 $ci = & get_instance();
 // $ci->db->where('startDate <=',$date);
 // $ci->db->where('dueDate >=',$date);
 $ci->db->where($whr);
 $ci->db->where_not_in('status',6);
 $ci->db->from($tbl);
 $count = $ci->db->count_all_results();
 return  $count;
}

function getactivetask($table,$whr,$date)
{
  $ci = & get_instance();
  $ci->db->select('*');
  $ci->db->from($table);
  $ci->db->where($whr);
  $ci->db->where('startDate <=',$date);
  $ci->db->where('dueDate >=',$date);
  $output = $ci->db->get();
  $output = $output->row();
  return $output;
}


function count_duetask($whr,$date)
{
  $ci = & get_instance();
  $ci->db->from('todoList as t');
  $ci->db->or_where('t.dueDate <',$date);
  $ci->db->where_not_in('t.status ',6);
  $ci->db->group_start();
  $ci->db->where($whr);
  $ci->db->where('t.milestone',0);
  $ci->db->where('t.saved ',0);
  $ci->db->group_end();
  $count = $ci->db->count_all_results();
  return  $count;
}
