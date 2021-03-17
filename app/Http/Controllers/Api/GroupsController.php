@@ -39,7 +39,7 @@ public function store(Request $request)
            'groups_id' => 'required',
        ]);

        $groups = groups::create([
        $g = groups::create([
            'nama' => $request->nama,
            'no_tlp' => $request->no_tlp,
            'alamat' => $request->alamat,
@@ -88,22 +88,16 @@ public function show($id)
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|unique:groups|max:255',
            'no_tlp' => 'required|numeric',
            'alamat' => 'required',
            'groups_id' => 'required'
        ]);
        $g = groups::find($id)->update([
        $groups = groups::find($id)->update([
            'nama' => $request->nama,
            'no_tlp' => $request->no_tlp,
            'alamat' => $request->alamat,
            'groups_id' => $request->groups_id
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Post Updated',
            'data' => $g
            'message' => 'Data Teman berhasil di rubah',
            'data' => $group
        ], 200);
    }

@@ -115,11 +109,11 @@ public function update(Request $request, $id)
     */
    public function destroy($id)
    {
        $cek = groups::find($id)->delete();
        $group = groups::find($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Post Updated',
            'data'    => $cek
            'message' => 'Data Teman Berhasil di hapus',
            'data'    => $group
        ], 200);
    }
}