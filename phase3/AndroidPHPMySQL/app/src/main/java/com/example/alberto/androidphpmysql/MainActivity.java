package com.example.alberto.androidphpmysql;

import android.app.ProgressDialog;
import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONException;
import org.json.JSONObject;
import org.w3c.dom.Text;

import java.util.HashMap;
import java.util.Map;

public class MainActivity extends AppCompatActivity implements View.OnClickListener {

    private EditText editTextUsername, editTextPassword, editTextEmail;
    private Button buttonRegister;

    private Button btnLogin , btnParentRegister, btnStudentRegister;

//    private ProgressDialog progressDialog;
    private TextView textViewLogin;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

//


        editTextUsername = (EditText) findViewById(R.id.editTextUsername);
        editTextPassword = (EditText) findViewById(R.id.editTextPassword);
        editTextEmail = (EditText) findViewById(R.id.editTextEmail);
        textViewLogin = (TextView) findViewById(R.id.textViewLogin);

        buttonRegister = (Button) findViewById(R.id.buttonRegister);

        btnLogin = findViewById(R.id.btnLogin);
        btnParentRegister = findViewById(R.id.btnParentRegister);
        btnStudentRegister = findViewById(R.id.btnStudentRegister);


        btnLogin.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                startActivity(new Intent(getApplicationContext(), LoginActivity.class));

            }
        });


        btnParentRegister.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                startActivity(new Intent(getApplicationContext(), ParentRegistrationActivity.class));
            }
        });

        btnStudentRegister.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                startActivity(new Intent(getApplicationContext(), StudentRegistrationActivity.class));
            }
        });



//        progressDialog = new ProgressDialog(this);
        buttonRegister.setOnClickListener(this);
        textViewLogin.setOnClickListener(this);



    }
    private void registerUser(){

        final String username = editTextUsername.getText().toString().trim();
        final String password = editTextPassword.getText().toString().trim();
        final String email = editTextEmail.getText().toString().trim();

//        progressDialog.setMessage("Registering user...");
//        progressDialog.show();
        final String url = "http://10.0.0.184:8888/Android/v1/registerUser.php";

        StringRequest stringRequest = new StringRequest(Request.Method.POST, url, new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
//                        progressDialog.dismiss();
                        try {
                            JSONObject jsonObject = new JSONObject(response);

                            Toast.makeText(getApplicationContext(),jsonObject.getString("message"),Toast.LENGTH_LONG).show();
                        } catch (JSONException e){
                            e.printStackTrace();
                        }
                    }
                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
//                        progressDialog.hide();
                        Toast.makeText(getApplicationContext(), error.getMessage(), Toast.LENGTH_LONG).show();
                    }
                })
        {

            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                Map<String,String> params = new HashMap<>();
                params.put("username", username);
                params.put("password", password);
                params.put("email", email);
                return params;
            }
        };

       //RequestHandler.getInstance(this).addToRequestQueue(stringRequest);
       Volley.newRequestQueue(this).add(stringRequest);
    }

    @Override
    public void onClick(View view) {
        if(view == buttonRegister) {
            registerUser();
        }
        if(view == textViewLogin){
            startActivity(new Intent(this, LoginActivity.class));
        }
    }
}
