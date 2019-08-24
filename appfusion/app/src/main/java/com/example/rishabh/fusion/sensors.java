package com.example.rishabh.fusion;

import com.google.gson.annotations.Expose;
import com.google.gson.annotations.SerializedName;

/**
 * Created by Rishabh on 23-08-2019.
 */

public class sensors {

    @SerializedName("id")
    @Expose
    private String id;
    @SerializedName("bin")
    @Expose
    private String bin;
    @SerializedName("ldrflag")
    @Expose
    private String ldrflag;
    @SerializedName("enose")
    @Expose
    private String enose;

    public String getId() {
        return id;
    }

    public void setId(String id) {
        this.id = id;
    }

    public String getBin() {
        return bin;
    }

    public void setBin(String bin) {
        this.bin = bin;
    }

    public String getLdrflag() {
        return ldrflag;
    }

    public void setLdrflag(String ldrflag) {
        this.ldrflag = ldrflag;
    }

    public String getEnose() {
        return enose;
    }

    public void setEnose(String enose) {
        this.enose = enose;
    }
//[{"id":"1305","bin":"Bin 1 Kolkata","ldrflag":"1","enose":"99"}]
}