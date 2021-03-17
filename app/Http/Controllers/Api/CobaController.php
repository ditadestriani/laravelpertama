@@ -39,7 +39,7 @@ public function store(Request $request)
            'groups_id' => 'required',
        ]);

        $friends = Friends::create([
        $f = Friends::create([
            'nama' => $request->nama,
            'no_tlp' => $request->no_tlp,
            'alamat' => $request->alamat,
@@ -88,22 +88,16 @@ public function show($id)
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|unique:friends|max:255',
            'no_tlp' => 'required|numeric',
            'alamat' => 'required',
            'groups_id' => 'required'
        ]);
        $f = Friends::find($id)->update([
        $friends = Friends::find($id)->update([
            'nama' => $request->nama,
            'no_tlp' => $request->no_tlp,
            'alamat' => $request->alamat,
            'groups_id' => $request->groups_id
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Post Updated',
            'data' => $f
            'message' => 'Data Teman berhasil di rubah',
            'data' => $friend
        ], 200);
    }

@@ -115,11 +109,11 @@ public function update(Request $request, $id)
     */
    public function destroy($id)
    {
        $cek = Friends::find($id)->delete();
        $friend = Friends::find($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Post Updated',
            'data'    => $cek
            'message' => 'Data Teman Berhasil di hapus',
            'data'    => $friend
        ], 200);
    }
}