package com.example.rishabh.fusion;

import android.app.Notification;
import android.content.Intent;
import android.graphics.Color;
import android.media.MediaPlayer;
import android.support.v4.app.NotificationCompat;
import android.support.v4.app.NotificationManagerCompat;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;

import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.github.mikephil.charting.charts.BarChart;
import com.github.mikephil.charting.charts.LineChart;
import com.github.mikephil.charting.data.BarData;
import com.github.mikephil.charting.data.BarDataSet;
import com.github.mikephil.charting.data.BarEntry;
import com.github.mikephil.charting.data.Entry;
import com.github.mikephil.charting.data.LineData;
import com.github.mikephil.charting.data.LineDataSet;
import com.github.mikephil.charting.interfaces.datasets.IBarDataSet;
import com.github.mikephil.charting.interfaces.datasets.ILineDataSet;
import com.google.gson.Gson;
import com.google.gson.GsonBuilder;
import java.util.ArrayList;
import java.util.Timer;
import java.util.TimerTask;

import static java.lang.Integer.parseInt;

public class MainActivity extends AppCompatActivity {
//    Button btnBarChart, btnPieChart;
     int[] colorClassArray = new int[]{Color.BLUE,Color.CYAN,Color.RED,Color.MAGENTA};
//    private MediaPlayer mediaPlayer;
    private final String CHANNEL_ID = "personal_notifications";
    private final int NOTIFICATION_ID = 001;
    private static final String URL ="http://192.168.43.171/androidapi.php";
    //"http://10.4.168.116/androidapi.php";
      public LineChart mpLineChart;
      public int x=0,f=0;
    ArrayList<ILineDataSet> dataSets;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        mpLineChart = findViewById(R.id.linechart);
//        mediaPlayer = MediaPlayer.create(this, R.raw.buzzing);
        dataSets = new ArrayList<>();
        startnewservice();

        final StringRequest request=new StringRequest(URL, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                GsonBuilder gsonBuilder = new GsonBuilder();
                Gson gson=gsonBuilder.create();
                sensors[] user=gson.fromJson(response,sensors[].class);
                updateUI(user[0].getBin(),user[0].getLdrflag(),user[0].getEnose());
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
    }

    private ArrayList<Entry> datValues1(String bin,String ldr,String enose)
    {
        ArrayList<Entry> dataVals = new ArrayList<Entry>();
        int a=Integer.parseInt(enose);
        if(ldr.equals("1"))
        {  //NotificationCompat.Builder noti = new NotificationCompat.Builder(this,CHANNEL_ID)
            NotificationCompat.Builder builder = new NotificationCompat.Builder(this,CHANNEL_ID)
                    .setSmallIcon(R.drawable.ic_launcher_background)
                    .setContentTitle(bin)
                    .setContentText("READY FOR PICKUP")
                    .setPriority(NotificationCompat.PRIORITY_DEFAULT);

            NotificationManagerCompat notificationManagerCompat=NotificationManagerCompat.from(this);
                    notificationManagerCompat.notify(NOTIFICATION_ID,builder.build());

        }

        Log.d("check error",a+" ");
        dataVals.add(new Entry(x+1,a));
        if(x>5)
            dataSets.remove(0);
        x+=1;
        return dataVals;
    }
    public void updateUI(String bin,String ldr,String enose)
    {
        LineDataSet lineDataSet1 = new LineDataSet(datValues1(bin,ldr,enose),"data of garbage bin:"+bin);
        lineDataSet1.setColor(colorClassArray[2]);
        dataSets.add(lineDataSet1);
        LineData data = new LineData(dataSets);
        mpLineChart.setData(data);
        mpLineChart.notifyDataSetChanged();
        mpLineChart.invalidate();
    }
    public void startnewservice()
    {
        Intent i= new Intent(this,ServiceHandler.class);
        startService(i);
    }
}

