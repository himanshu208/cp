<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Cisociall_model extends CI_Model
{
    /*--------------------------------------------------------------*/
    public function __construct()
    {
        parent::__construct();
        $this->primary_key      = 'id';
        $this->ip_address       = 'ip_address';
        $this->table_name       = 'cisociall_users';
        $this->table_sessions   = 'cisociall_sessions';
        $this->provider_name    = 'provider_name';
        $this->identifier       = 'identifier';
    }

    /* ---------- Insert and Update User Profiles to [Social Users Table] ---------- */
    public function insert_update_social_users($data = array())
    {
        $this->db->select($this->primary_key);
        $this->db->from($this->table_name);
        $this->db->where(array($this->provider_name=>$data['provider_name'],$this->identifier=>$data['identifier']));
        $first_query = $this->db->get();
        $first_control = $first_query->num_rows();
        
        if($first_control > 0){
            $first_result = $first_query->row_array();
            $data['modified_date'] = time();
            $update = $this->db->update($this->table_name,$data,array($this->primary_key=>$first_result['id']));
            $user_data_id = $first_result['id'];
        }else{
            $data['created_date'] = time();
            $data['modified_date'] = time();
            $insert = $this->db->insert($this->table_name,$data);
            $user_data_id = $this->db->insert_id();
        }
            //if ($user_data_id) {return $user_data_id;} else {return FALSE;} // Normal if condition
            return $user_data_id?$user_data_id:FALSE; // Shortland version if condition
    }

    /* --- Delete Account from [Social Users Table] --- */
    public function delete_account($user_id, $user_identifier)
    {
        $this->db->where(array($this->primary_key=>$user_id, $this->identifier=>$user_identifier));
        $query = $this->db->delete($this->table_name);
        return $query;
    }

    /* --- Activate Account from [Social Users Table] --- */
    public function activate($id)
    {
        $data = array(
                'active' => 1
        );
        $this->db->where($this->primary_key, $id);
        $query = $this->db->update($this->table_name, $data);
        return $query;
    }

    /* --- Deactivate Account from [Social Users Table] --- */
    public function deactivate($id, $sess_identifier, $admin_identifier)
    {
        // Get datas from database
        $this->db->where(array($this->primary_key=>$id, $this->identifier=>$sess_identifier))->limit(1);
        // After control this data
        $query = $this->db->get($this->table_name)->row();
            // If it is admin account, there is no deactivation. Forbidden to deactivate admin account!

            if ($query->identifier==$admin_identifier) {
                // Do Nothing!
                $data = array(
                    'active' => 1
                );
                $this->db->where($this->primary_key, $id);
                $query = $this->db->update($this->table_name, $data);
                return $query;
            }
            else // If it is NOT admin account, deactivation completed
            {
                $data = array(
                    'active' => 0
                );
                $this->db->where($this->primary_key, $id);
                $query = $this->db->update($this->table_name, $data);
                return $query;
            }      
    }

    /* --- Delete Old Sessions from [Cisociall_Sessions Table] --- */
    public function delete_old_sessions()
    {
        $this->db->where(array('timestamp<'=>time()-600, $this->ip_address=>$this->input->ip_address()));
        $query = $this->db->delete($this->table_sessions);
        return $query;
    }
    /* --- Select All Social Users for Google Map in Admin Dashboard from [Social Users Table] --- */
    public function get_all_users()
    {
        $this->db->order_by('modified_date', "desc");
        $query = $this->db->get($this->table_name)->result();
        return $query;
    }
    /* --- Select All Social Users order by created time desc with limit for pagination from [Social Users Table] --- */
    public function get_all_users_orderby_modified_desc($per_page, $segment)
    {
        $this->db->limit($per_page, $segment);
        $this->db->order_by('modified_date', "desc");
        $query = $this->db->get($this->table_name)->result();
        return $query;
    }

    /* ---- Select Provider Users with limit for pagination from [Social Users Table] ---- */
    public function get_provider_users_for_pagination($per_page, $provider, $segment)
    {
        $this->db->limit($per_page, $segment);
        $this->db->where($this->provider_name, $provider);
        $this->db->order_by('modified_date', "desc"); 
        $query=$this->db->get($this->table_name)->result();
        return $query;
    }

    /* --- Already Login Profile Details [Social Users Table] --- */
    public function already_login($identifier)
    {
        $this->db->where($this->identifier, $identifier);
        $query = $this->db->get($this->table_name)->result();
        return $query;
    }

    /* --- Social User Profile Details [Social Users Table] --- */
    public function get_user_profile($user_id)
    {
        $this->db->where($this->primary_key, $user_id);
        $query = $this->db->get($this->table_name)->result();
        return $query;
    }

    /* --- Get Related Accounts which have same email with currents profile in [Social Users Table] --- */
    public function get_related_accounts($user_email, $user_id)
    {
        $this->db->where(array('email'=>$user_email, 'id!='=>$user_id ));
        $this->db->order_by('modified_date', "desc"); 
        $query = $this->db->get($this->table_name)->result();
        return $query;
    }

    /* ------ Count Provider Users Total From [Social Users Table] ------ */
    public function count_provider_users($provider)
    {
        $this->db->where($this->provider_name, $provider);
        $query = $this->db->get($this->table_name)->num_rows();
        return $query;
    }

    /* ------ Get Top 5 Providers From [Social Users Table] ------ */
    public function top_providers($count)
    {
        $this->db->select('provider_name, COUNT(provider_name) as total');
        $this->db->group_by('provider_name');
        $this->db->order_by('total', 'desc');
        $query = $this->db->get($this->table_name, $count)->result();
        return $query;
    }

    /* ------ Get Top 5 Platforms From [Social Users Table] ------ */
    public function top_platforms($count)
    {
        $this->db->select('platform, COUNT(platform) as total');
        $this->db->group_by('platform');
        $this->db->order_by('total', 'desc');
        $query = $this->db->get($this->table_name, $count)->result();
        return $query;
    }

    /* ------ Get Top 5 Mobiles From [Social Users Table] ------ */
    public function top_mobiles($count)
    {
        $this->db->select('mobile, COUNT(mobile) as total');
        $this->db->group_by('mobile');
        $this->db->order_by('total', 'desc');
        $query = $this->db->get($this->table_name, $count)->result();
        return $query;
    }

    /* ------ Get Top 5 Browsers From [Social Users Table] ------ */
    public function top_browsers($count)
    {
        $this->db->select('browser, COUNT(browser) as total');
        $this->db->group_by('browser');
        $this->db->order_by('total', 'desc');
        $query = $this->db->get($this->table_name, $count)->result();
        return $query;
    }
    /*--------------------------------------------------------------*/
} // Class End