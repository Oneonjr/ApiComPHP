<?php 

namespace App\Repositories;
use Illuminate\Http\Request;

interface TaskRepositoryInterface
{
    public function getAll();
    public function get($id);
    public function store(Request $request);
    public function update($id, Request $request);
    public function destroy($id);
}