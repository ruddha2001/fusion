package com.example.rishabh.fusion;

import android.app.Notification;
import android.app.Service;
import android.content.Intent;
import android.media.MediaPlayer;
import android.os.IBinder;
import android.support.annotation.Nullable;
import android.support.v4.app.NotificationCompat;
import android.support.v4.app.NotificationManagerCompat;
import android.widget.Toast;

import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.google.gson.Gson;
import com.google.gson.GsonBuilder;

import java.util.Timer;
import java.util.TimerTask;

//import static android.provider.ContactsContract.CommonDataKinds.Website.URL;

/**
 * Created by Rishabh on 24-08-2019.
 */

public class ServiceHandler extends Service {
    private MediaPlayer mediaPlayer;
    int f=0;
    private static final String URL ="http://192.168.43.171/androidapi.php";
    private final String CHANNEL_ID = "personal_notifications";
    private final int NOTIFICATION_ID = 001;


    @Nullable
    @Override
    public IBinder onBind(Intent intent) {
        return null;
    }

    @Override
    public void onCreate() {
        super.onCreate();
//        mediaPlayer = MediaPlayer.create(this, R.raw.buzzing);
        Toast.makeText(this,"Service Create",Toast.LENGTH_SHORT);
    }

    @Override
    public int onStartCommand(Intent intent, int flags, int startId) {
        Toast.makeText(this,"Service Start",Toast.LENGTH_SHORT);
        final StringRequest request=new StringRequest(URL, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                GsonBuilder gsonBuilder = new GsonBuilder();
                Gson gson=gsonBuilder.create();
                sensors[] user=gson.fromJson(response,sensors[].class);
                String k = user[0].getLdrflag();
                if(k.equals("1"))
                {   NotificationCompat.Builder builder = new NotificationCompat.Builder(ServiceHandler.this,CHANNEL_ID)
                        .setSmallIcon(R.drawable.ic_launcher_background)
                        .setContentTitle(user[0].getBin())
                        .setContentText("READY FOR PICKUP")
                        .setPriority(NotificationCompat.PRIORITY_DEFAULT);

                    NotificationManagerCompat notificationManagerCompat=NotificationManagerCompat.from(ServiceHandler.this);
                    notificationManagerCompat.notify(NOTIFICATION_ID,builder.build());

//            mediaPlayer.seekTo(0);
//            mediaPlayer.start();f=1;
                }
                else if(f==1)
                {
//            mediaPlayer.pause();f=0;
                }
            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
            }
        });
        final RequestQueue queue = Volley.newRequestQueue(this);
        new Timer().scheduleAtFixedRate(new TimerTask(){
            @Override
            public void run(){
                queue.add(request);

            }
        },0,2000);

        return super.onStartCommand(intent, flags, startId);
    }

    @Override
    public void onDestroy() {
        Toast.makeText(this,"Service Destroy", Toast.LENGTH_SHORT);
        super.onDestroy();
    }
}
