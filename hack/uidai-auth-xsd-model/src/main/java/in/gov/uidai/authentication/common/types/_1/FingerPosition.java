//
// This file was generated by the JavaTM Architecture for XML Binding(JAXB) Reference Implementation, v2.2.11 
// See <a href="http://java.sun.com/xml/jaxb">http://java.sun.com/xml/jaxb</a> 
// Any modifications to this file will be lost upon recompilation of the source schema. 
// Generated on: 2015.06.06 at 01:34:16 PM IST 
//


package in.gov.uidai.authentication.common.types._1;

import javax.xml.bind.annotation.XmlEnum;
import javax.xml.bind.annotation.XmlType;


/**
 * <p>Java class for FingerPosition.
 * 
 * <p>The following schema fragment specifies the expected content contained within this class.
 * <p>
 * <pre>
 * &lt;simpleType name="FingerPosition"&gt;
 *   &lt;restriction base="{http://www.w3.org/2001/XMLSchema}string"&gt;
 *     &lt;enumeration value="LEFT_INDEX"/&gt;
 *     &lt;enumeration value="LEFT_LITTLE"/&gt;
 *     &lt;enumeration value="LEFT_MIDDLE"/&gt;
 *     &lt;enumeration value="LEFT_RING"/&gt;
 *     &lt;enumeration value="LEFT_THUMB"/&gt;
 *     &lt;enumeration value="RIGHT_INDEX"/&gt;
 *     &lt;enumeration value="RIGHT_LITTLE"/&gt;
 *     &lt;enumeration value="RIGHT_MIDDLE"/&gt;
 *     &lt;enumeration value="RIGHT_RING"/&gt;
 *     &lt;enumeration value="RIGHT_THUMB"/&gt;
 *     &lt;enumeration value="UNKNOWN"/&gt;
 *   &lt;/restriction&gt;
 * &lt;/simpleType&gt;
 * </pre>
 * 
 */
@XmlType(name = "FingerPosition")
@XmlEnum
public enum FingerPosition {

    LEFT_INDEX,
    LEFT_LITTLE,
    LEFT_MIDDLE,
    LEFT_RING,
    LEFT_THUMB,
    RIGHT_INDEX,
    RIGHT_LITTLE,
    RIGHT_MIDDLE,
    RIGHT_RING,
    RIGHT_THUMB,
    UNKNOWN;

    public String value() {
        return name();
    }

    public static FingerPosition fromValue(String v) {
        return valueOf(v);
    }

}
