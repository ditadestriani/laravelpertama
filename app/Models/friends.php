@@ -9,7 +9,7 @@ class Friends extends Model
{
    use HasFactory;

    protected $guarded = ['mana'];
    protected $fillable = ['nama','no_tlp','alamat'];

    public function groups()
    {
