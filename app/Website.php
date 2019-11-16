<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    protected $fillable = ['name', 'URL', 'is_suspended', 'is_deleted', 'domain_id'];
    
    public function createWebsite($params){
        $website = new Website;
        $website->name = $params['name'];
        $website->URL = $params['URL'];
        $website->domain_id = $params['domain_id'];
        $website->is_suspended = false;
        $website->is_deleted = false;
        $website->save();
        return response()->json(['message' => 'Website created!'], 200);
        
    }
    public function updateWebsite($params, $id){
        $website = Website::findOrFail($id);
        $website->name = $params['name'];
        $website->URL = $params['URL'];
        $website->domain_id = $params['domain_id'];
        $website->is_suspended = $params['is_suspended'];
        $website->is_deleted = $params['is_deleted'];
        $website->save();
        return response()->json(['message' => 'Website updated!'], 200);
    }
    public function deleteWebsite($id){
        $website = Website::findOrFail($id);
        $website->is_deleted = 1;
        $website->save();
        return response()->json(['message' => 'Website deleted!'], 200);
    }
}
