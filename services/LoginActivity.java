
package com.tescha.easytutorias;

import android.content.DialogInterface;
import android.content.Intent;
import android.os.Build;
import android.os.Bundle;
import android.support.design.widget.CoordinatorLayout;
import android.support.design.widget.Snackbar;
import android.support.design.widget.TextInputLayout;
import android.support.v7.app.AlertDialog;
import android.support.v7.app.AppCompatActivity;
import android.text.Editable;
import android.text.TextWatcher;
import android.view.View;
import android.view.WindowManager;
import android.widget.Button;
import android.widget.CheckBox;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;
import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.tescha.easytutorias.entidades.ValidationUserJSON;
import com.tescha.easytutorias.view.About.LogoActivity;
import com.tescha.easytutorias.view.Administrador.Admin_HomeActivity;
import com.tescha.easytutorias.view.Alumno.Alumno_HomeActivity;
import com.tescha.easytutorias.view.Coordinador.Coordinador_HomeActivity;
import com.tescha.easytutorias.view.CreateAccountActivity;
import com.tescha.easytutorias.view.SQLite_Note.Note_HOME_Activity;
import com.tescha.easytutorias.view.Tutor.Tutor_HomeActivity;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.Map;
import butterknife.BindView;
import butterknife.ButterKnife;
import butterknife.OnClick;


public class LoginActivity extends AppCompatActivity implements View.OnClickListener,Response.Listener<JSONObject>,Response.ErrorListener {

    JSONArray cont;
    boolean bo;
    EditText edtv_user, edtv_pass;
    TextInputLayout textinput_user, textinput_pass;
    CheckBox  remember_pass;
    Button btn_login;
    ValidationUserJSON miusuario = new ValidationUserJSON();
    @BindView(R.id.login_title)
    TextView loginTitle;
    @BindView(R.id.login_subtitle)
    TextView loginSubtitle;
    @BindView(R.id.btn_validar_PASS)
    Button btnValidarPASS;
    ImageView LOGO;

    //Cachamos la matricula



    private CoordinatorLayout coordinatorLayout;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);
        ButterKnife.bind(this);
        activityFULLSCREEN();



        //View decorView = getWindow().getDecorView();

        /*
        if (Build.VERSION.SDK_INT >= Build.VERSION_CODES.LOLLIPOP) {
            decorView.setSystemUiVisibility(
                    View.SYSTEM_UI_FLAG_LAYOUT_STABLE
                            | View.SYSTEM_UI_FLAG_LAYOUT_HIDE_NAVIGATION
                            | View.SYSTEM_UI_FLAG_LAYOUT_FULLSCREEN
                            | View.SYSTEM_UI_FLAG_HIDE_NAVIGATION
                            | View.SYSTEM_UI_FLAG_FULLSCREEN
                            | View.SYSTEM_UI_FLAG_IMMERSIVE_STICKY
            );
            //getWindow().setNavigationBarColor();
            //getWindow().setStatusBarColor(getResources().getColor(R.color.icons));
        }
*/
        edtv_user      = (EditText)        findViewById(R.id.input_name);
        Defining_components();
        coordinatorLayout = (CoordinatorLayout) findViewById(R.id.coordinatorLayout);

        if (android.os.Build.VERSION.SDK_INT >= Build.VERSION_CODES.LOLLIPOP) {
        getWindow().setNavigationBarColor(getResources().getColor(R.color.editTextColorWhite));
        getWindow().setStatusBarColor(getResources().getColor(R.color.icons));
         }

        btn_login = (Button) findViewById(R.id.btn_signup);
        btn_login.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                //Tengo que validar que se ha ingresado 9 caracteres
                //Recuerda cambiar el 8 por el 9
                if ((edtv_user.length()<8)) {
                    textinput_user.setError(getString(R.string.err_msg_matricula_login));
                    //textinput_2.setError(getString(R.string.err_msg_password_login));
                    //requestFocus(input_Current_password);
                } else {
                    textinput_user.setErrorEnabled(false);
                    submitForm();
                }





            }
        });

        LOGO = (ImageView)findViewById(R.id.logo);
        LOGO.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                //Dentro de esta accion mostraremos la mision y vision del tecnologico
                Intent intent =  new Intent(LoginActivity.this,LogoActivity.class );
                startActivity(intent);
            }
        });
    }
    public void createSimpleDialog() {
        AlertDialog.Builder dialogo = new AlertDialog.Builder(this);
        dialogo.setMessage("\nLa matricula que ingresaste no coincide con ninguna cuenta.\n\n Verifica tus datos")
                .setTitle("Error")
                .setIcon(R.drawable.ic_action_cancel)
                .setPositiveButton
                ("ACEPTAR", new DialogInterface.OnClickListener()
                    {
                        @Override
                        public void onClick(DialogInterface dialog, int which)
                        {
                            if (dialog != null)
                            {
                                dialog.cancel();
                            }
                        }
                    }
                );
        dialogo.show();
    }

    public void Defining_components() {
        //edtv_user      = (EditText)        findViewById(R.id.input_name);
        edtv_pass      = (EditText)        findViewById(R.id.input_password);
        textinput_user = (TextInputLayout) findViewById(R.id.input_layout_name);
        textinput_pass = (TextInputLayout) findViewById(R.id.input_layout_password);
        remember_pass  = findViewById(R.id.recordar_check);



        btnValidarPASS.setVisibility(View.GONE);
        edtv_pass.setVisibility(View.GONE);
        textinput_pass.setVisibility(View.GONE);
        remember_pass.setVisibility(View.GONE);
    }

    private void submitForm() {
        if (!validateName())     {return;}

        /*if (!validatePassword()) {return;}
        */

        Snackbar snackbar = Snackbar.make(coordinatorLayout, "Verificando Datos ...", Snackbar.LENGTH_LONG);
        snackbar.show();

        //WebServiceVolley();
        Intent intent =  new Intent(LoginActivity.this,Note_HOME_Activity.class );
        //intent.putExtra("matricula",edtv_user.getText().toString());
        startActivity(intent);

    }

    public void WebServiceVolley() {
        RequestQueue res2 = Volley.newRequestQueue(getApplicationContext());
        //String url = "https://appsgte.000webhostapp.com/login.php";

        String IP =getString(R.string.ip);
        String url = IP +"/sgte/login.php";
        //Toast.makeText(getApplicationContext(), url,Toast.LENGTH_LONG).show();
        StringRequest respuesta2 = new StringRequest(Request.Method.POST, url, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                ArrayList<String> listado = new ArrayList<>();
                String texto = "";
                    //Toast.makeText(getApplicationContext(), response.toString(),Toast.LENGTH_LONG).show();
                    String negacion = response.toString();
                try {
                    cont = new JSONArray(response);
                    if (negacion == "no"){
                        Toast.makeText(getApplicationContext(), "El usuario no existe", Toast.LENGTH_SHORT).show();
                    }else {
                        for (int i = 0;  i < cont.length();  i++ ){
                            miusuario.setMatricula(cont.getJSONObject(i).getInt("matricula"));
                            miusuario.setPassword(cont.getJSONObject(i).getString("password"));
                            miusuario.setId_role(cont.getJSONObject(i).getInt("id_role"));
                            miusuario.setNombre(cont.getJSONObject(i).getString("nombre"));
                        }
                        //Toast.makeText(getApplicationContext(), "Hola "+miusuario.getNombre().toString(), Toast.LENGTH_SHORT).show();

                        loginTitle.setText("Hola "+ miusuario.getNombre().toString());
                        loginSubtitle.setText("Debes verificar tu identidad para poder continuar");
                        edtv_user.setVisibility(View.GONE);
                        textinput_user.setVisibility(View.GONE);
                        edtv_pass.setVisibility(View.VISIBLE);
                        textinput_pass.setVisibility(View.VISIBLE);
                        btn_login.setVisibility(View.GONE);
                        btnValidarPASS.setVisibility(View.VISIBLE);

                        //Validaremos la contraseña

                    }
                } catch (JSONException e) {
                    e.printStackTrace();
                    createSimpleDialog();
                }

            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                Toast.makeText(getApplicationContext(), "Verifica tu conexión", Toast.LENGTH_SHORT).show();
            }
        }) {
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {

                Map<String, String> params = new HashMap<String, String>();
                params.put("m", edtv_user.getText().toString());
                return params;
            }
        };
        RequestQueue requestQueue = Volley.newRequestQueue(getApplicationContext());
        requestQueue.add(respuesta2);
    }



    private boolean validateName() {
        if (edtv_user.getText().toString().trim().isEmpty()) {
            textinput_user.setError(getString(R.string.err_msg_user));
            requestFocus(edtv_user);
            return false;
        } else {
            textinput_user.setErrorEnabled(false);
        }
        return true;
    }
    private boolean validatePassword() {
        if (edtv_pass.getText().toString().trim().isEmpty()) {
            textinput_pass.setError(getString(R.string.err_msg_password_login));
            requestFocus(edtv_pass);
            return false;
        } else {
            textinput_pass.setErrorEnabled(false);
        }
        return true;
    }
    private void requestFocus(View view) {
        if (view.requestFocus()) {
            getWindow().setSoftInputMode(WindowManager.LayoutParams.SOFT_INPUT_STATE_ALWAYS_VISIBLE);
        }
    }

    @OnClick(R.id.btn_validar_PASS)
    public void onViewClicked() {

        //Toast.makeText(getApplicationContext(), miusuario.getPassword().toString() ,Toast.LENGTH_LONG).show();
        /*
        * Dentro de este metodo verificaremos la contraseña y redireccionaremos segun ID_ROLE
        *
        * */

        //Primer paso nesecitamos dos valores PASSWORD y ID_ROLE




    if ((edtv_pass.getText().toString().trim().isEmpty()))
    {
           textinput_pass.setError(getString(R.string.err_msg_password_login));
    } else
        {
            textinput_pass.setErrorEnabled(false);
            int ROLE           = miusuario.getId_role();
            String evalua_pass = miusuario.getPassword().toString();

            if (edtv_pass.getText().toString().equals(evalua_pass)){
                Toast.makeText(getApplicationContext(),"Bien",Toast.LENGTH_LONG).show();
                if(ROLE == 1){
                    //Administrador
                    Intent intent =  new Intent(LoginActivity.this,Admin_HomeActivity.class );
                    startActivity(intent);
                    //Toast.makeText(getApplicationContext(), "Bienvenido", Toast.LENGTH_SHORT).show();
                }else if (ROLE == 2){
                    //Definir

                }
                else if (ROLE == 3){
                    //Coordinador
                    Intent intent =  new Intent(LoginActivity.this,Coordinador_HomeActivity.class );
                    startActivity(intent);

                }
                else if (ROLE == 4){
                    //Falta definir
                    Intent intent =  new Intent(LoginActivity.this,Tutor_HomeActivity.class );
                    intent.putExtra("matricula",edtv_user.getText().toString());
                    startActivity(intent);
                }
                else if (ROLE == 5){
                    //Alumno
                    Intent intent =  new Intent(LoginActivity.this, Alumno_HomeActivity.class );
                    intent.putExtra("matricula",edtv_user.getText().toString());
                    startActivity(intent);
                    //Toast.makeText(getApplicationContext(), "Bienvenido", Toast.LENGTH_SHORT).show();
                }
            }else{
                Toast.makeText(getApplicationContext(),"Contraseña incorrecta. Vuelve a intentarlo",Toast.LENGTH_LONG).show();
            }

        }


    }


    private class MyTextWatcher implements TextWatcher {
        private View view;
        private MyTextWatcher(View view) {
            this.view = view;
        }
        public void beforeTextChanged(CharSequence charSequence, int i, int i1, int i2) { }
        public void onTextChanged(CharSequence charSequence, int i, int i1, int i2) { }
        @Override
        public void afterTextChanged(Editable editable) {
            switch (view.getId()) {
                case R.id.input_name:
                    validateName();
                    break;
                    /*
                case R.id.input_password:
                    validatePassword();
                    break;
                    */
            }
        }
    }


    @Override
    public void onClick(View view) { }

    @Override
    public void onErrorResponse(VolleyError error) { }

    @Override
    public void onResponse(JSONObject response) { }
    @Override
    protected void onRestart() {
        super.onRestart();
        activityFULLSCREEN();
    }

    public void activityFULLSCREEN() {
        View decorView = getWindow().getDecorView();
        if (Build.VERSION.SDK_INT >= Build.VERSION_CODES.KITKAT) {
            decorView.setSystemUiVisibility(
                    View.SYSTEM_UI_FLAG_LAYOUT_STABLE
                            | View.SYSTEM_UI_FLAG_LAYOUT_HIDE_NAVIGATION
                            | View.SYSTEM_UI_FLAG_LAYOUT_FULLSCREEN
                            | View.SYSTEM_UI_FLAG_HIDE_NAVIGATION
                            | View.SYSTEM_UI_FLAG_FULLSCREEN
                            | View.SYSTEM_UI_FLAG_IMMERSIVE_STICKY
            );
        }
    }


}